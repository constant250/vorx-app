import{j as l,u as x,r as n,o as v,g as V,d as m,a as e,w as s,e as u,b as t}from"./app.307c3eef.js";import{_ as d}from"./InputError.2e7d56a0.js";/* empty css            */const O={__name:"CourseStructureFeesDomTab",setup(k){l([{id:1,code:"czxc2311",description:"Lorem ipsum dolor sit amet consectetur adipisicing elit.",status:1},{id:2,code:"czxc2311",description:"Lorem ipsum dolor sit amet consectetur adipisicing elit.",status:2},{id:3,code:"czxc2311",description:"Lorem ipsum dolor sit amet consectetur adipisicing elit.",status:2},{id:4,code:"czxc2311",description:"Lorem ipsum dolor sit amet consectetur adipisicing elit.",status:2}]),l(!1),l([{label:"10",value:"10"},{label:"25",value:"50"},{label:"50",value:"50"},{label:"100",value:"100"}]),l([{value:"Code",sort:"asc",columnId:"code"},{value:"Description",sort:"asc",columnId:"description"},"Status","Action"]),l(["code","description",{slot:"status"},{slot:"actions"}]),l(1),l(10),l([{id:1,name:"xx/xx/xxxx"},{id:2,name:"course name"}]),l({defaultDate:"today"}),l(""),l("");const o=x({cricos_code:"",duration:"",training_work_weekly:"",location:"",material_fees:"",enrolment_application_fees:"",onshore_tuition_fee:"",offshore_tuition_fee:"",package:""}),_=l([{label:"Option 1",value:"1"},{label:"Option 2",value:"2"},{label:"Option 3",value:"3"},{label:"Option 4",value:"4"},{label:"Option 5",value:"5"}]);return l(0),l(0),l(0),l(0),(w,a)=>{const p=n("dvi"),f=n("ui-select"),c=n("ui-grid-cell"),r=n("ui-textfield"),g=n("ui-grid"),b=n("ui-collapse");return v(),V("div",null,[m("form",null,[e(b,{"with-icon":"",ripple:""},{toggle:s(()=>[e(p,null,{default:s(()=>[u("CHC50121 - Diploma of Early Childhood Education and Care VIC")]),_:1})]),default:s(()=>[m("div",null,[e(g,{class:"demo-grid"},{default:s(()=>[e(c,{class:"demo-cell",columns:"6"},{default:s(()=>[e(f,{modelValue:t(o).location,"onUpdate:modelValue":a[0]||(a[0]=i=>t(o).location=i),options:_.value,class:"mt-1 block w-full"},{default:s(()=>[u(" Location: ")]),_:1},8,["modelValue","options"]),e(d,{class:"mt-1",message:t(o).errors.location},null,8,["message"])]),_:1}),e(c,{class:"demo-cell",columns:"6"},{default:s(()=>[e(r,{modelValue:t(o).cricos_code,"onUpdate:modelValue":a[1]||(a[1]=i=>t(o).cricos_code=i),id:"code",class:"mt-1 block w-full","input-type":"text",required:""},{default:s(()=>[u(" Concessional Fee: ")]),_:1},8,["modelValue"]),e(d,{class:"mt-1",message:t(o).errors.cricos_code},null,8,["message"])]),_:1}),e(c,{class:"demo-cell",columns:"6"},{default:s(()=>[e(r,{modelValue:t(o).duration,"onUpdate:modelValue":a[2]||(a[2]=i=>t(o).duration=i),id:"code",class:"mt-1 block w-full","input-type":"number",required:""},{default:s(()=>[u(" Non-concessional Fees: ")]),_:1},8,["modelValue"]),e(d,{class:"mt-1",message:t(o).errors.duration},null,8,["message"])]),_:1}),e(c,{class:"demo-cell",columns:"6"},{default:s(()=>[e(r,{modelValue:t(o).training_work_weekly,"onUpdate:modelValue":a[3]||(a[3]=i=>t(o).training_work_weekly=i),id:"code",class:"mt-1 block w-full","input-type":"number",required:""},{default:s(()=>[u(" Full Fee: ")]),_:1},8,["modelValue"]),e(d,{class:"mt-1",message:t(o).errors.training_work_weekly},null,8,["message"])]),_:1}),e(c,{class:"demo-cell",columns:"6"},{default:s(()=>[e(r,{modelValue:t(o).material_fees,"onUpdate:modelValue":a[4]||(a[4]=i=>t(o).material_fees=i),id:"code",class:"mt-1 block w-full","input-type":"number",required:""},{default:s(()=>[u(" Minimum Payment: ")]),_:1},8,["modelValue"]),e(d,{class:"mt-1",message:t(o).errors.material_fees},null,8,["message"])]),_:1})]),_:1})])]),_:1})])])}}};export{O as default};