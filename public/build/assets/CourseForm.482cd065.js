import{u as x,j as m,r as n,o as i,g as d,a as e,b as p,H as C,w as t,d as u,L as y,e as a,F as V}from"./app.5d61f75a.js";import{A as k}from"./AuthenticatedLayout.868ab5f0.js";import F from"./CourseInfoTab.1fd2392e.js";import A from"./CourseUnitsTab.b2feb795.js";import L from"./CourseStructureFeesIntlTab.2e323b8e.js";import T from"./CourseStructureFeesDomTab.19558415.js";import"./ApplicationLogo.6f9cceed.js";import"./InputError.08437753.js";const U={class:"flex item-center"},$={class:"flex items-center"},B={class:"font-semibold text-lg text-gray-800 leading-tight"},D={key:0},I={key:1},N={class:"grid grid-cols-5 gap-5"},G={__name:"CourseForm",props:{course:Object},setup(f){const o=f;x({code:o.course?o.course.code:"",name:o.course?o.course.name:"",target_enrolee:o.course?o.course.target_enrolee:0,tp_code:o.course?o.course.tp_code:"",status:o.course?o.course.status:1}),m([{label:"Active",value:"1"},{label:"Inactive",value:"2"}]);const r=m(0);return(b,c)=>{const v=n("ui-icon-button"),s=n("ui-tab"),g=n("ui-tabs"),l=n("ui-panel"),h=n("ui-panels");return i(),d(V,null,[e(p(C),{title:"Create Course"}),e(k,null,{header:t(()=>[u("div",U,[e(p(y),{href:b.route("course.index")},{default:t(()=>[e(v,{icon:"keyboard_backspace",class:"mr-3 text-xs"})]),_:1},8,["href"]),u("div",$,[u("h2",B,[o.course?(i(),d("span",I," Update Course ")):(i(),d("span",D," Create Course "))])])])]),default:t(()=>[u("div",null,[u("div",N,[e(g,{modelValue:r.value,"onUpdate:modelValue":c[0]||(c[0]=_=>r.value=_),class:"stacked-tabs pr-4 border-r-2 border-gray-400"},{default:t(()=>[e(s,null,{default:t(()=>[a("Info")]),_:1}),e(s,null,{default:t(()=>[a("Units")]),_:1}),e(s,null,{default:t(()=>[a("Course Structure and Fees(International)")]),_:1}),e(s,null,{default:t(()=>[a("Course Structure and Fees(Domestic)")]),_:1}),e(s,null,{default:t(()=>[a("Training Delivery Location")]),_:1}),e(s,null,{default:t(()=>[a("Attachments")]),_:1})]),_:1},8,["modelValue"]),e(h,{modelValue:r.value,"onUpdate:modelValue":c[1]||(c[1]=_=>r.value=_),class:"col-span-4"},{default:t(()=>[e(l,null,{default:t(()=>[e(F)]),_:1}),e(l,null,{default:t(()=>[e(A)]),_:1}),e(l,null,{default:t(()=>[e(L)]),_:1}),e(l,null,{default:t(()=>[e(T)]),_:1}),e(l,null,{default:t(()=>[a("Training Delivery Location")]),_:1}),e(l,null,{default:t(()=>[a("Attachments")]),_:1})]),_:1},8,["modelValue"])])])]),_:1})],64)}}};export{G as default};