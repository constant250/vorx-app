import{u as c,o as f,c as w,w as n,a as o,b as e,H as _,d as r,e as V,n as b,f as g}from"./app.f89afd08.js";import{G as k}from"./GuestLayout.2a67e75b.js";import{_ as l,a as i,b as m}from"./TextInput.5ee330e1.js";import{_ as v}from"./PrimaryButton.b80a71a5.js";/* empty css            */import"./ApplicationLogo.213f07eb.js";const y=["onSubmit"],x={class:"mt-4"},P={class:"mt-4"},S={class:"flex items-center justify-end mt-4"},h={__name:"ResetPassword",props:{email:String,token:String},setup(u){const d=u,s=c({token:d.token,email:d.email,password:"",password_confirmation:""}),p=()=>{s.post(route("password.update"),{onFinish:()=>s.reset("password","password_confirmation")})};return($,a)=>(f(),w(k,null,{default:n(()=>[o(e(_),{title:"Reset Password"}),r("form",{onSubmit:g(p,["prevent"])},[r("div",null,[o(l,{for:"email",value:"Email"}),o(i,{id:"email",type:"email",class:"mt-1 block w-full",modelValue:e(s).email,"onUpdate:modelValue":a[0]||(a[0]=t=>e(s).email=t),required:"",autofocus:"",autocomplete:"username"},null,8,["modelValue"]),o(m,{class:"mt-2",message:e(s).errors.email},null,8,["message"])]),r("div",x,[o(l,{for:"password",value:"Password"}),o(i,{id:"password",type:"password",class:"mt-1 block w-full",modelValue:e(s).password,"onUpdate:modelValue":a[1]||(a[1]=t=>e(s).password=t),required:"",autocomplete:"new-password"},null,8,["modelValue"]),o(m,{class:"mt-2",message:e(s).errors.password},null,8,["message"])]),r("div",P,[o(l,{for:"password_confirmation",value:"Confirm Password"}),o(i,{id:"password_confirmation",type:"password",class:"mt-1 block w-full",modelValue:e(s).password_confirmation,"onUpdate:modelValue":a[2]||(a[2]=t=>e(s).password_confirmation=t),required:"",autocomplete:"new-password"},null,8,["modelValue"]),o(m,{class:"mt-2",message:e(s).errors.password_confirmation},null,8,["message"])]),r("div",S,[o(v,{class:b({"opacity-25":e(s).processing}),disabled:e(s).processing},{default:n(()=>[V(" Reset Password ")]),_:1},8,["class","disabled"])])],40,y)]),_:1}))}};export{h as default};
