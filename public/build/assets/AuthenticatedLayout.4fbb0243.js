import{k as I,z as M,m as _,j as D,o as c,g as p,d as e,h as f,i as w,v as k,a as d,w as a,n as u,b as n,T as N,c as x,L as b,e as h,t as v,l as $,s as C}from"./app.f89afd08.js";import{A as B}from"./ApplicationLogo.213f07eb.js";const j={class:"relative"},z={__name:"Dropdown",props:{align:{default:"right"},width:{default:"48"},contentClasses:{default:()=>["py-1","bg-white"]}},setup(r){const s=r,i=o=>{t.value&&o.key==="Escape"&&(t.value=!1)};I(()=>document.addEventListener("keydown",i)),M(()=>document.removeEventListener("keydown",i));const g=_(()=>({48:"w-48"})[s.width.toString()]),m=_(()=>s.align==="left"?"origin-top-left left-0":s.align==="right"?"origin-top-right right-0":"origin-top"),t=D(!1);return(o,l)=>(c(),p("div",j,[e("div",{onClick:l[0]||(l[0]=y=>t.value=!t.value)},[f(o.$slots,"trigger")]),w(e("div",{class:"fixed inset-0 z-40",onClick:l[1]||(l[1]=y=>t.value=!1)},null,512),[[k,t.value]]),d(N,{"enter-active-class":"transition ease-out duration-200","enter-from-class":"transform opacity-0 scale-95","enter-to-class":"transform opacity-100 scale-100","leave-active-class":"transition ease-in duration-75","leave-from-class":"transform opacity-100 scale-100","leave-to-class":"transform opacity-0 scale-95"},{default:a(()=>[w(e("div",{class:u(["absolute z-50 mt-2 rounded-md shadow-lg",[n(g),n(m)]]),style:{display:"none"},onClick:l[2]||(l[2]=y=>t.value=!1)},[e("div",{class:u(["rounded-md ring-1 ring-black ring-opacity-5",r.contentClasses])},[f(o.$slots,"content")],2)],2),[[k,t.value]])]),_:3})]))}},E={__name:"DropdownLink",setup(r){return(s,i)=>(c(),x(n(b),{class:"block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out"},{default:a(()=>[f(s.$slots,"default")]),_:3}))}},L={__name:"NavLink",props:["href","active"],setup(r){const s=r,i=_(()=>s.active?"inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition  duration-150 ease-in-out":"inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out");return(g,m)=>(c(),x(n(b),{href:r.href,class:u(n(i))},{default:a(()=>[f(g.$slots,"default")]),_:3},8,["href","class"]))}},S={__name:"ResponsiveNavLink",props:["href","active"],setup(r){const s=r,i=_(()=>s.active?"block pl-3 pr-4 py-2 border-l-4 border-indigo-400 text-base font-medium text-indigo-700 bg-indigo-50 focus:outline-none focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 transition duration-150 ease-in-out":"block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out");return(g,m)=>(c(),x(n(b),{href:r.href,class:u(n(i))},{default:a(()=>[f(g.$slots,"default")]),_:3},8,["href","class"]))}},V={class:"min-h-screen bg-gray-100"},A={class:"bg-white border-b border-gray-100"},O={class:"mx-auto px-4 sm:px-6 lg:px-8"},T={class:"flex justify-between h-16"},R={class:"flex"},U={class:"shrink-0 flex items-center"},q={class:"hidden space-x-8 sm:-my-px sm:ml-10 sm:flex"},F={class:"hidden sm:flex sm:items-center sm:ml-6"},G={class:"ml-3 relative"},H={class:"inline-flex rounded-md"},J={type:"button",class:"inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"},K=e("svg",{class:"ml-2 -mr-0.5 h-4 w-4",xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20",fill:"currentColor"},[e("path",{"fill-rule":"evenodd",d:"M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z","clip-rule":"evenodd"})],-1),P={class:"-mr-2 flex items-center sm:hidden"},Q={class:"h-6 w-6",stroke:"currentColor",fill:"none",viewBox:"0 0 24 24"},W={class:"pt-2 pb-3 space-y-1"},X={class:"pt-4 pb-1 border-t border-gray-200"},Y={class:"px-4"},Z={class:"font-medium text-base text-gray-800"},ee={class:"font-medium text-sm text-gray-500"},te={class:"mt-3 space-y-1"},se={key:0,class:"bg-white shadow"},oe={class:"mx-auto py-6 px-4 sm:px-6 lg:px-8"},ae={key:1,class:"mx-auto pt-6 px-4 sm:px-6 lg:px-8"},ne={class:u("bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"),role:"alert"},re={class:"font-bold"},de={__name:"AuthenticatedLayout",setup(r){const s=D(!1),i=localStorage.getItem("user_name"),g=localStorage.getItem("user_email"),m=()=>{C.post("/api/v1/logout").then(t=>{t.data.status=="Success"&&(localStorage.removeItem("user-token"),localStorage.removeItem("isViewed"),localStorage.removeItem("isLogged"),localStorage.removeItem("user_name"),localStorage.removeItem("user_email"),C.post("/logout").then(o=>{o.data.status=="success"&&(window.location.href="/login")}).catch(o=>{console.log(o)}))}).catch(t=>{console.log(t)})};return(t,o)=>(c(),p("div",null,[e("div",V,[e("nav",A,[e("div",O,[e("div",T,[e("div",R,[e("div",U,[d(n(b),{href:t.route("dashboard")},{default:a(()=>[d(B,{class:"block h-9 w-auto"})]),_:1},8,["href"])]),e("div",q,[d(L,{href:t.route("dashboard"),active:t.route().current("dashboard")},{default:a(()=>[h(" Dashboard ")]),_:1},8,["href","active"]),d(L,{href:t.route("course.index"),active:t.route().current("course.index")},{default:a(()=>[h(" Course ")]),_:1},8,["href","active"])])]),e("div",F,[e("div",G,[d(z,{align:"right",width:"48"},{trigger:a(()=>[e("span",H,[e("button",J,[h(v(n(i))+" ",1),K])])]),content:a(()=>[d(E,{onClick:o[0]||(o[0]=l=>m()),as:"button"},{default:a(()=>[h(" Log Out ")]),_:1})]),_:1})])]),e("div",P,[e("button",{onClick:o[1]||(o[1]=l=>s.value=!s.value),class:"inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out"},[(c(),p("svg",Q,[e("path",{class:u({hidden:s.value,"inline-flex":!s.value}),"stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"M4 6h16M4 12h16M4 18h16"},null,2),e("path",{class:u({hidden:!s.value,"inline-flex":s.value}),"stroke-linecap":"round","stroke-linejoin":"round","stroke-width":"2",d:"M6 18L18 6M6 6l12 12"},null,2)]))])])])]),e("div",{class:u([{block:s.value,hidden:!s.value},"sm:hidden"])},[e("div",W,[d(S,{href:t.route("dashboard"),active:t.route().current("dashboard")},{default:a(()=>[h(" Dashboard ")]),_:1},8,["href","active"])]),e("div",X,[e("div",Y,[e("div",Z,v(n(i)),1),e("div",ee,v(n(g)),1)]),e("div",te,[d(S,{onClick:o[2]||(o[2]=l=>m()),as:"button"},{default:a(()=>[h(" Log Out ")]),_:1})])])],2)]),t.$slots.header?(c(),p("header",se,[e("div",oe,[f(t.$slots,"header")])])):$("",!0),t.$page.props.flash.message?(c(),p("div",ae,[e("div",ne,[e("strong",re,v(t.$page.props.flash.message),1)])])):$("",!0),e("main",null,[f(t.$slots,"default")])])]))}};export{de as _};
