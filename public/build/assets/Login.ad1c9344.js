import{m as h,i as w,p as k,b as t,o as f,g as b,q as x,u as v,r as g,c as y,w as i,a as o,H as V,t as C,l as B,d as a,e as u,n as S,f as L,s as p}from"./app.307c3eef.js";import{G as N}from"./GuestLayout.a249d5a0.js";import{_}from"./InputError.2e7d56a0.js";/* empty css            */import"./ApplicationLogo.aecf82d2.js";const U=["value"],q={__name:"Checkbox",props:{checked:{type:[Array,Boolean],default:!1},value:{default:null}},emits:["update:checked"],setup(n,{emit:e}){const m=n,l=h({get(){return m.checked},set(s){e("update:checked",s)}});return(s,r)=>w((f(),b("input",{type:"checkbox",value:n.value,"onUpdate:modelValue":r[0]||(r[0]=c=>x(l)?l.value=c:null),class:"rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"},null,8,U)),[[k,t(l)]])}},R={key:0,class:"mb-4 font-medium text-sm text-green-600"},$=["onSubmit"],A={class:"mt-4"},D={class:"block mt-4"},E={class:"flex items-center"},G=a("span",{class:"ml-2 text-sm text-white"},"Remember me",-1),H={class:"flex items-center justify-end mt-4"},F={__name:"Login",props:{canResetPassword:Boolean,status:String},setup(n){const e=v({email:"",password:"",remember:!1}),m=()=>{p.get("/sanctum/csrf-cookie").then(l=>{console.log(l),p.post("/api/v1/login",{email:e.email,password:e.password}).then(s=>{localStorage.setItem("user-token",s.data.data.token),p.post("/login",{email:e.email,password:e.password}).then(r=>{window.location.href="/dashboard"})}).catch(s=>{console.log(s)})})};return(l,s)=>{const r=g("ui-textfield"),c=g("ui-button");return f(),y(N,null,{default:i(()=>[o(t(V),{title:"Log in"}),n.status?(f(),b("div",R,C(n.status),1)):B("",!0),a("form",{onSubmit:L(m,["prevent"]),class:"shadow-lg rounded-lg p-5 backdrop-blur-sm backdrop-saturate-50 bg-white/30 shadow-lg"},[a("div",null,[o(r,{"input-type":"email",modelValue:t(e).email,"onUpdate:modelValue":s[0]||(s[0]=d=>t(e).email=d),required:"",class:"w-full",attrs:{autocomplete:"username"}},{default:i(()=>[u(" Email Address ")]),_:1},8,["modelValue"]),o(_,{class:"mt-2",message:t(e).errors.email},null,8,["message"])]),a("div",A,[o(r,{"input-type":"password",modelValue:t(e).password,"onUpdate:modelValue":s[1]||(s[1]=d=>t(e).password=d),required:"",class:"w-full",attrs:{autocomplete:"current-password"}},{default:i(()=>[u(" Password ")]),_:1},8,["modelValue"]),o(_,{class:"mt-2",message:t(e).errors.password},null,8,["message"])]),a("div",D,[a("label",E,[o(q,{name:"remember",checked:t(e).remember,"onUpdate:checked":s[2]||(s[2]=d=>t(e).remember=d)},null,8,["checked"]),G])]),a("div",H,[o(c,{nativeType:"submit",class:S(["w-full",{"opacity-25":t(e).processing}]),disabled:t(e).processing,unelevated:""},{default:i(()=>[u("Log in")]),_:1},8,["class","disabled"])])],40,$)]),_:1})}}};export{F as default};
