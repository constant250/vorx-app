import{u,m as f,o as a,c as p,w as s,a as o,b as e,H as _,g,l as h,d as i,e as n,n as y,L as b,f as v}from"./app.307c3eef.js";import{G as k}from"./GuestLayout.a249d5a0.js";import{_ as x}from"./PrimaryButton.d8f4d888.js";/* empty css            */import"./ApplicationLogo.aecf82d2.js";const w=i("div",{class:"mb-4 text-sm text-gray-600"}," Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another. ",-1),V={key:0,class:"mb-4 font-medium text-sm text-green-600"},B=["onSubmit"],L={class:"mt-4 flex items-center justify-between"},H={__name:"VerifyEmail",props:{status:String},setup(r){const c=r,t=u(),d=()=>{t.post(route("verification.send"))},l=f(()=>c.status==="verification-link-sent");return(m,E)=>(a(),p(k,null,{default:s(()=>[o(e(_),{title:"Email Verification"}),w,e(l)?(a(),g("div",V," A new verification link has been sent to the email address you provided during registration. ")):h("",!0),i("form",{onSubmit:v(d,["prevent"])},[i("div",L,[o(x,{class:y({"opacity-25":e(t).processing}),disabled:e(t).processing},{default:s(()=>[n(" Resend Verification Email ")]),_:1},8,["class","disabled"]),o(e(b),{href:m.route("logout"),method:"post",as:"button",class:"underline text-sm text-gray-600 hover:text-gray-900"},{default:s(()=>[n("Log Out")]),_:1},8,["href"])])],40,B)]),_:1}))}};export{H as default};
