<?php

namespace App\Models\Services;

use App\Models\Account;
use App\Models\Enums\RoleTypeEnum;
use App\Models\Enums\StorageDiskEnum;
use App\Models\RoleSetupTemplate;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class AccountService extends ModelService
{
    /**
     * @var Account
     */
    private $account;

    public function __construct(Account $account)
    {
        $this->account = $account;
        $this->model = $account;
    }

    public static function create(
        string $company_name,
        string $first_name,
        string $last_name,
        string $email,
        string $password
    )
    {
        DB::beginTransaction();
        try {
            $account = new Account();
            $account->company_name = $company_name;
            $account->save();

            $user = new User();
            $user->account_id = $account->id;
            $user->first_name = $first_name;
            $user->last_name = $last_name;
            $user->email = $email;
            $user->password = Hash::make($password);
            $user->is_owner = true;
            $user->role_id = RoleTypeEnum::ADMINISTRATOR;
            $user->save();

            SettingService::create($user);

            DB::commit();

            return $user;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw new \Exception($th->getMessage());
        }
    }

    public function update(
        string $company_name,
        string $facebook_app_id = null,
        string $facebook_app_secret = null,
        string $facebook_business_manager_id = null,
        string $facebook_access_token = null,
        string $facebook_line_of_credit_id = null,
        string $facebook_primary_page_id = null
    )
    {
        $this->account->company_name = $company_name;
        $this->account->facebook_app_id = $facebook_app_id;
        $this->account->facebook_app_secret = $facebook_app_secret;
        $this->account->facebook_business_manager_id = $facebook_business_manager_id;
        $this->account->facebook_access_token = $facebook_access_token;
        $this->account->facebook_line_of_credit_id = $facebook_line_of_credit_id;
        $this->account->facebook_primary_page_id = $facebook_primary_page_id;

        $this->account->save();
        return $this->account->fresh();
    }

    public function updateReport(string $report_token = null)
    {
        $this->account->report_token = $report_token;
        $this->account->save();

        return $this->account->fresh();
    }

    public function addFacebookPage(
        $account,
        $page_id
    )
    {
        $payload = [
            'page_id' => $page_id,
            'access_token' => $account->facebook_access_token,
            'permitted_tasks' => ['ADVERTISE', 'ANALYZE']
        ];
        $api = Http::post( "https://graph.facebook.com/v12.0/{$account->facebook_business_manager_id}/owned_pages",$payload);


        // $payload = [
        //     'page_id' => $page_id,
        //     'access_token' => $account->facebook_access_token,
        //     'permitted_tasks' => ['ADVERTISE', 'ANALYZE']
        // ];
        // $api = Http::post( "https://graph.facebook.com/v12.0/{$account->facebook_business_manager_id}/client_pages",$payload);


        $apiResult = $api->json();

        dd($apiResult);
    }

    public function viewFacebookPage($account)
    {
        $payload = [
            'access_token' => $account->facebook_access_token,
        ];

        $api = Http::get( "https://graph.facebook.com/v12.0/{$account->facebook_business_manager_id}/owned_pages",$payload);
        $apiResult = $api->json();

        dd($apiResult);
    }

    public function assignFacebookUsertoPage(
        $account,
        $page_id
    )
    {
        $payload = [
            'user' => '100077353902925',
            'tasks' => ['MANAGE', 'CREATE_CONTENT', 'MODERATE', 'ADVERTISE', 'ANALYZE'],
            'business' => $account->facebook_business_manager_id,
            'access_token' => $account->facebook_access_token,
        ];

        $api = Http::post( "https://graph.facebook.com/v12.0/{$page_id}/assigned_users",$payload);
        $apiResult = $api->json();

        dd($apiResult);
    }

    public function facebookCheckConfig()
    {
        $check = ChannelFacebookService::getBusinessManagers(
            $this->account->facebook_business_manager_id,
            $this->account->facebook_app_secret,
            $this->account->facebook_access_token
        );

        if(isset($check['data'])) {
            return [
                'success' => true,
                'message' => 'Successfully connected to Facebook API',
                'data' => $check['data']
            ];
        }

        return $check;
    }

    public function updateAnalytics(
        string $view_id,
        UploadedFile $analytic_file,
        string $analytic_script
    ) {
        $file = $this->account->FileServiceFactory('analytics', StorageDiskEnum::LOCAL())
            ->uploadFile($analytic_file, 'service-account-credentials');

        $this->account->view_id = $view_id;
        $this->account->analytic_file = $file['dir_path'];
        $this->account->analytic_script = $analytic_script;
        $this->account->save();

        return $this->account->fresh();
    }
}
