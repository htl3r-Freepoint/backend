(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-c5e40e40"],{1470:function(t,e,o){"use strict";var s=o("5169"),a=o.n(s);a.a},"1f9c":function(t,e,o){"use strict";var s=o("e8fe"),a=o.n(s);a.a},2336:function(t,e,o){"use strict";var s=o("9001"),a=o.n(s);a.a},"3a90":function(t,e,o){},5169:function(t,e,o){},6613:function(t,e,o){},"714b":function(t,e,o){"use strict";var s=function(){var t=this,e=t.$createElement,o=t._self._c||e;return o("div",{staticClass:"modal fade",attrs:{tabindex:"-1",role:"dialog","aria-labelledby":"modalCreateNewCoupon","aria-hidden":"true"}},[o("div",{staticClass:"modal-dialog modal-dialog-centered",attrs:{role:"document"}},[o("div",{staticClass:"modal-content"},[o("div",{staticClass:"modal-header"},[o("h5",{staticClass:"modal-title",attrs:{id:"exampleModalLongTitle"}},[t._v(t._s(t.title))]),t._m(0)]),o("div",{staticClass:"modal-body"},[t._t("default")],2)])])])},a=[function(){var t=this,e=t.$createElement,o=t._self._c||e;return o("button",{staticClass:"close",attrs:{type:"button","data-dismiss":"modal","aria-label":"Close"}},[o("span",{attrs:{"aria-hidden":"true"}},[t._v("×")])])}],n={name:"Modal",props:["title"]},i=n,r=o("2877"),c=Object(r["a"])(i,s,a,!1,null,"74403a3e",null);e["a"]=c.exports},9001:function(t,e,o){},c062:function(t,e,o){"use strict";var s=o("6613"),a=o.n(s);a.a},cd7f:function(t,e,o){"use strict";var s=o("3a90"),a=o.n(s);a.a},e8fe:function(t,e,o){},f43e:function(t,e,o){"use strict";var s=function(){var t=this,e=t.$createElement,o=t._self._c||e;return o("div",{staticClass:"coupon"},[o("div",{staticClass:"card",on:{click:t.showActionModal}},[o("div",{staticClass:"card-body text-left d-flex flex-column justify-content-between pb-1"},[o("div",[o("h4",{staticClass:"font-weight-bold"},[t._v(t._s(this.coupon.title))]),o("p",[t._v(t._s(this.coupon.text))])]),o("footer",{staticClass:"d-flex flex-row justify-content-between"},[o("div",[o("h4",{staticClass:"font-weight-bold text-nowrap"},[t._v(" "+t._s(t.coupon.isPercent?!(this.coupon.percentage>0)||this.coupon.percentage>=100?"Gratis":"-"+this.coupon.percentage+"%":!(this.coupon.price>0)||this.coupon.price>=100?"Gratis":"-"+this.coupon.price+"€")+" ")])]),o("h4",{staticClass:"primary-text font-weight-bold text-nowrap"},[t._v(t._s(this.coupon.value+" ")+" "),o("font-awesome-icon",{attrs:{icon:"receipt"}})],1)])]),t.$slots.actionIcon?o("div",{staticClass:"control-buttons"},[t.$slots.actionIcon?o("button",{staticClass:"btn btn-primary btn-action",on:{click:t.showActionModal}},[t._t("actionIcon")],2):t._e()]):t._e()]),t.$slots.modal?o("modal",{attrs:{id:"modalActionCoupon"+t.coupon.id}},[t._t("modal")],2):t._e()],1)},a=[],n=o("ecee"),i=o("c074"),r=o("714b");n["c"].add(i["A"]);var c={name:"Coupon",components:{Modal:r["a"]},props:["coupon"],methods:{showActionModal:function(){this.$store.state.user.token?this.$("#modalActionCoupon"+this.coupon.id).modal():this.$router.push("/login")}}},l=c,u=(o("cd7f"),o("2877")),p=Object(u["a"])(l,s,a,!1,null,"833725e4",null);e["a"]=p.exports},fd38:function(t,e,o){"use strict";o.r(e);var s=function(){var t=this,e=t.$createElement,o=t._self._c||e;return o("div",{staticClass:"container"},[o("div",{staticClass:"d-flex justify-content-between"},[o("h2",{staticClass:"text-uppercase font-weight-bold"},[t._v(" "+t._s(t.$store.state.company.companyName?t.$store.state.company.companyName:"ERROR: no Company selected")+" ")]),o("div",{staticClass:"d-flex justify-content-end"},[o("router-link",{staticClass:"btn btn-primary",attrs:{to:"/"}},[t._v("Zurück")])],1)]),o("div",[o("h2",{staticClass:"text-left border-bottom"},[t._v("Gutscheine")]),o("div",{staticClass:"row justify-content-center py-2",attrs:{id:"coupon-container"}},[t._l(t.$store.state.coupons,(function(t,e){return o("coupon-edit",{key:e,staticClass:"col-sm-6 col-md-4 col-xl-3",attrs:{coupon:t}})})),o("div",{staticClass:"add-coupon col-sm-6 col-md-4 col-xl-3"},[o("button",{staticClass:"btn-block",attrs:{"data-toggle":"modal","data-target":"#modalCreateNewCoupon"}},[o("font-awesome-icon",{attrs:{icon:"plus-circle"}})],1)])],2)]),t.$store.state.couponsNew.length>0?o("div",[o("div",{staticClass:"d-flex flex-row justify-content-between border-bottom"},[o("h2",{staticClass:"text-left"},[t._v("Neu")]),o("button",{staticClass:"btn btn-primary",on:{click:function(e){return t.sendCouponArray("/newCoupon",t.$store.state.couponsNew,"resetCouponNew")}}},[o("font-awesome-icon",{attrs:{icon:"check"}})],1)]),o("div",t._l(t.$store.state.couponsNew,(function(t,e){return o("coupon",{key:e,staticClass:"col-sm-6 col-md-4 col-xl-3",attrs:{coupon:t}})})),1)]):t._e(),t.$store.state.couponsEdit.length>0?o("div",[o("div",{staticClass:"d-flex flex-row justify-content-between border-bottom"},[o("h2",{staticClass:"text-left"},[o("font-awesome-icon",{attrs:{icon:"pen"}}),t._v(" Ändern ")],1),o("button",{staticClass:"btn btn-primary",on:{click:function(e){return t.sendCouponArray("/editCoupon",t.$store.state.couponsEdit,"resetCouponEdit")}}},[o("font-awesome-icon",{attrs:{icon:"check"}})],1)]),o("div",t._l(t.$store.state.couponsEdit,(function(t,e){return o("coupon",{key:e,staticClass:"col-sm-6 col-md-4 col-xl-3",attrs:{coupon:t}})})),1)]):t._e(),t.$store.state.couponsDelete.length>0?o("div",[o("div",{staticClass:"d-flex flex-row justify-content-between border-bottom"},[o("h2",{staticClass:"text-left"},[t._v(" Löschen ")]),o("button",{staticClass:"btn btn-primary",on:{click:function(e){return t.sendCouponArray("/deleteCoupon",t.$store.state.couponsDelete,"resetCouponDelete")}}},[o("font-awesome-icon",{attrs:{icon:"check"}})],1)]),o("div",t._l(t.$store.state.couponsDelete,(function(t,e){return o("coupon",{key:e,staticClass:"col-sm-6 col-md-4 col-xl-3",attrs:{coupon:t}})})),1)]):t._e(),o("modal",{attrs:{id:"modalCreateNewCoupon",title:"Neuer Coupon"}},[o("form-new-coupon")],1)],1)},a=[],n=function(){var t=this,e=t.$createElement,o=t._self._c||e;return o("form",{attrs:{role:"form"}},[o("div",{staticClass:"row row-input"},[o("div",{staticClass:"form-group col"},[o("input",{directives:[{name:"model",rawName:"v-model",value:t.title,expression:"title"}],staticClass:"form-control",attrs:{type:"text",placeholder:"Titel",required:""},domProps:{value:t.title},on:{input:function(e){e.target.composing||(t.title=e.target.value)}}})])]),o("div",{staticClass:"row row-input"},[o("div",{staticClass:"form-group col"},[o("textarea",{directives:[{name:"model",rawName:"v-model",value:t.text,expression:"text"}],staticClass:"form-control",attrs:{placeholder:"Beschreibung",required:""},domProps:{value:t.text},on:{input:function(e){e.target.composing||(t.text=e.target.value)}}})])]),o("div",{staticClass:"row"},[o("div",{staticClass:"form-group col"},[o("input",{directives:[{name:"model",rawName:"v-model",value:t.value,expression:"value"}],staticClass:"form-control",attrs:{type:"number",placeholder:"Benötigte Punkte",min:"1",required:""},domProps:{value:t.value},on:{input:function(e){e.target.composing||(t.value=e.target.value)}}})])]),o("div",{staticClass:"row row-input btn-toolbar"},[o("div",{staticClass:"col btn-group"},[o("label",{staticClass:"btn btn-primary font-weight-bold"},[o("input",{directives:[{name:"model",rawName:"v-model",value:t.isPercent,expression:"isPercent"}],attrs:{type:"radio"},domProps:{value:!1,checked:t._q(t.isPercent,!1)},on:{change:function(e){t.isPercent=!1}}}),o("span",[t._v("Euro €")])]),o("label",{staticClass:"btn btn-primary font-weight-bold"},[o("input",{directives:[{name:"model",rawName:"v-model",value:t.isPercent,expression:"isPercent"}],attrs:{type:"radio"},domProps:{value:!0,checked:t._q(t.isPercent,!0)},on:{change:function(e){t.isPercent=!0}}}),o("span",[t._v("Prozent %")])])])]),o("div",{staticClass:"row row-input"},[t.isPercent?o("div",{staticClass:"input-group col"},[o("input",{directives:[{name:"model",rawName:"v-model",value:t.percentage,expression:"percentage"}],staticClass:"col form-control px-0",attrs:{type:"range",min:"0",max:"100"},domProps:{value:t.percentage},on:{__r:function(e){t.percentage=e.target.value}}}),o("div",{staticClass:"input-group-append"},[o("input",{directives:[{name:"model",rawName:"v-model",value:t.percentage,expression:"percentage"}],staticClass:"input-group-text",attrs:{type:"number",min:"0",max:"100"},domProps:{value:t.percentage},on:{input:function(e){e.target.composing||(t.percentage=e.target.value)}}}),o("span",{staticClass:"input-group-text"},[t._v("%")])])]):o("div",{staticClass:"input-group col"},[o("input",{directives:[{name:"model",rawName:"v-model",value:t.price,expression:"price"}],staticClass:"col form-control",attrs:{type:"number",placeholder:"Preis"},domProps:{value:t.price},on:{input:function(e){e.target.composing||(t.price=e.target.value)}}}),t._m(0)])]),o("div",{staticClass:"container"},[o("div",{staticClass:"row control-buttons justify-content-between"},[o("button",{staticClass:"col-5 btn btn-danger",attrs:{type:"button","data-dismiss":"modal"},on:{click:t.resetData}},[t._v("Abbrechen")]),o("button",{staticClass:"col-5 btn btn-primary",attrs:{type:"button","data-dismiss":"modal",disabled:""===t.title||t.value<1},on:{click:t.saveCoupon}},[t._v("Speichern ")])])])])},i=[function(){var t=this,e=t.$createElement,o=t._self._c||e;return o("div",{staticClass:"input-group-append"},[o("span",{staticClass:"input-group-text"},[t._v("€")])])}],r={name:"FormNewCoupon",props:["store"],data:function(){return{url:"http://freepoint.at/api",isPercent:!0,title:"",text:"",price:1,percentage:0,value:1}},methods:{saveCoupon:function(){this.$store.commit("pushCouponsNew",{isPercent:this.isPercent,title:this.title,text:this.text,price:this.price,percentage:this.percentage,value:this.value}),this.resetData()},resetData:function(){this.isPercent=!0,this.title="",this.text="",this.price=0,this.percentage=0,this.value=1}}},c=r,l=(o("2336"),o("2877")),u=Object(l["a"])(c,n,i,!1,null,"359e3639",null),p=u.exports,d=o("714b"),m=function(){var t=this,e=t.$createElement,o=t._self._c||e;return o("div",{staticClass:"coupon"},[o("div",{staticClass:"card"},[o("div",{staticClass:"card-body text-left d-flex flex-column justify-content-between pb-1"},[o("div",[o("h4",{staticClass:"font-weight-bold"},[t._v(t._s(this.coupon.title))]),o("p",[t._v(t._s(this.coupon.text))])]),o("footer",{staticClass:"d-flex flex-row justify-content-between"},[o("div",[o("h4",{staticClass:"font-weight-bold text-nowrap"},[t._v(" "+t._s(t.coupon.isPercent?!(this.coupon.percentage>0)||this.coupon.percentage>=100?"Gratis":"-"+this.coupon.percentage+"%":!(this.coupon.price>0)||this.coupon.price>=100?"Gratis":"-"+this.coupon.price+"€")+" ")])]),o("h4",{staticClass:"primary-text font-weight-bold text-nowrap"},[t._v(t._s(this.coupon.value+" FP"))])])]),o("div",{staticClass:"control-buttons"},[o("button",{staticClass:"btn btn-primary mb-1",attrs:{"data-toggle":"modal","data-target":"#modalEditCoupon"+t.coupon.id},on:{click:function(e){t.edit=!0}}},[o("font-awesome-icon",{attrs:{icon:"pen"}})],1),o("button",{staticClass:"btn btn-danger mt-1",on:{click:function(e){return t.$store.commit("pushCouponsDelete",t.coupon)}}},[o("font-awesome-icon",{attrs:{icon:"trash"}})],1)])]),o("modal",{attrs:{id:"modalEditCoupon"+t.coupon.id}},[o("form-edit-coupon",{attrs:{coupon:t.coupon}})],1)],1)},v=[],f=function(){var t=this,e=t.$createElement,o=t._self._c||e;return o("form",{attrs:{role:"form"}},[o("div",{staticClass:"row row-input"},[o("div",{staticClass:"form-group col"},[o("input",{directives:[{name:"model",rawName:"v-model",value:t.title,expression:"title"}],staticClass:"form-control",attrs:{type:"text",placeholder:"Titel"},domProps:{value:t.title},on:{input:function(e){e.target.composing||(t.title=e.target.value)}}})])]),o("div",{staticClass:"row row-input"},[o("div",{staticClass:"form-group col"},[o("textarea",{directives:[{name:"model",rawName:"v-model",value:t.text,expression:"text"}],staticClass:"form-control",attrs:{placeholder:"Beschreibung"},domProps:{value:t.text},on:{input:function(e){e.target.composing||(t.text=e.target.value)}}})])]),o("div",{staticClass:"row"},[o("div",{staticClass:"form-group col"},[o("input",{directives:[{name:"model",rawName:"v-model",value:t.value,expression:"value"}],staticClass:"form-control",attrs:{type:"number",placeholder:"Benötigte Punkte"},domProps:{value:t.value},on:{input:function(e){e.target.composing||(t.value=e.target.value)}}})])]),o("div",{staticClass:"row row-input btn-toolbar"},[o("div",{staticClass:"col btn-group"},[o("label",{staticClass:"btn btn-primary"},[o("input",{directives:[{name:"model",rawName:"v-model",value:t.isPercent,expression:"isPercent"}],attrs:{type:"radio"},domProps:{value:!1,checked:t._q(t.isPercent,!1)},on:{change:function(e){t.isPercent=!1}}}),o("span",{staticClass:"underline"},[t._v("Euro €")])]),o("label",{staticClass:"btn btn-primary"},[o("input",{directives:[{name:"model",rawName:"v-model",value:t.isPercent,expression:"isPercent"}],attrs:{type:"radio"},domProps:{value:!0,checked:t._q(t.isPercent,!0)},on:{change:function(e){t.isPercent=!0}}}),o("span",{staticClass:"underline"},[t._v("Prozent %")])])])]),o("div",{staticClass:"row row-input"},[t.isPercent?o("div",{staticClass:"input-group col"},[o("input",{directives:[{name:"model",rawName:"v-model",value:t.percentage,expression:"percentage"}],staticClass:"col form-control px-0",attrs:{type:"range",min:"0",max:"100"},domProps:{value:t.percentage},on:{__r:function(e){t.percentage=e.target.value}}}),o("div",{staticClass:"input-group-append"},[o("input",{directives:[{name:"model",rawName:"v-model",value:t.percentage,expression:"percentage"}],staticClass:"input-group-text",attrs:{type:"number",min:"0",max:"100"},domProps:{value:t.percentage},on:{input:function(e){e.target.composing||(t.percentage=e.target.value)}}}),o("span",{staticClass:"input-group-text"},[t._v("%")])])]):o("div",{staticClass:"input-group col"},[o("input",{directives:[{name:"model",rawName:"v-model",value:t.price,expression:"price"}],staticClass:"col form-control",attrs:{type:"number",placeholder:"Preis"},domProps:{value:t.price},on:{input:function(e){e.target.composing||(t.price=e.target.value)}}}),t._m(0)])]),o("div",{staticClass:"container"},[o("div",{staticClass:"row control-buttons justify-content-between"},[o("button",{staticClass:"col-5 btn btn-danger",attrs:{type:"button","data-dismiss":"modal"},on:{click:t.resetData}},[t._v("Abbrechen")]),o("button",{staticClass:"col-5 btn btn-primary",attrs:{type:"button","data-dismiss":"modal"},on:{click:t.saveCoupon}},[t._v("Speichern")])])])])},h=[function(){var t=this,e=t.$createElement,o=t._self._c||e;return o("div",{staticClass:"input-group-append"},[o("span",{staticClass:"input-group-text"},[t._v("€")])])}],C={name:"FormEditCoupon",components:{},props:["coupon"],data:function(){return{id:0,isPercent:!0,title:"",text:"",price:0,percentage:0,value:0}},created:function(){this.coupon&&this.resetData()},methods:{saveCoupon:function(){this.$store.commit("pushCouponsEdit",{id:this.id,isPercent:this.isPercent,title:this.title,text:this.text,price:this.price,percentage:this.percentage,value:this.value})},resetData:function(){this.id=this.coupon.id,this.isPercent=this.coupon.isPercent,this.title=this.coupon.title,this.text=this.coupon.text,this.price=this.coupon.price,this.percentage=this.coupon.percentage,this.value=this.coupon.value}}},g=C,b=(o("1470"),Object(l["a"])(g,f,h,!1,null,"28b66541",null)),w=b.exports,x=o("ecee"),_=o("c074");x["c"].add(_["w"],_["H"]);var y={name:"CouponEdit",components:{FormEditCoupon:w,Modal:d["a"]},props:["coupon"]},P=y,$=(o("c062"),Object(l["a"])(P,m,v,!1,null,"2f57d470",null)),N=$.exports,k=o("f43e");x["c"].add(_["x"],_["g"],_["w"]);var E={name:"RabattMenuEdit",components:{Coupon:k["a"],CouponEdit:N,Modal:d["a"],FormNewCoupon:p},created:function(){this.$store.commit("resetCouponAll")},mounted:function(){this.getData()},methods:{getData:function(){var t=this;console.debug("Company:",this.$store.state.company.companyName),this.$http.post(this.$store.state.url+"/getRabatt",{hash:this.$store.state.user.token,firmenname:this.$store.state.company.companyName}).then((function(e){console.debug("Coupons:",e),t.$store.commit("setCoupons",e.data.coupons),t.editRights=e.data.editRights}))},sendCouponArray:function(t,e,o){var s=this;e.length>0&&this.$http.post(this.$store.state.url+t,{hash:this.$store.state.user.token,firmenname:this.$store.state.company.companyName,data:JSON.stringify(e)}).then((function(t){console.debug(t),s.$store.commit(o),s.getData()}))}}},j=E,D=(o("1f9c"),Object(l["a"])(j,s,a,!1,null,"2436939e",null));e["default"]=D.exports}}]);
//# sourceMappingURL=chunk-c5e40e40.b2d37332.js.map