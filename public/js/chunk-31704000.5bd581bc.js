(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-31704000"],{"218b":function(t,o,e){"use strict";e.r(o);var s=function(){var t=this,o=t.$createElement,e=t._self._c||o;return e("div",{staticClass:"container"},[e("div",{staticClass:"d-flex justify-content-between"},[e("h2",{staticClass:"text-uppercase font-weight-bold"},[t._v(" "+t._s(t.$store.state.company.companyName?t.$store.state.company.companyName:"ERROR: no Company selected")+" ")]),2===t.editRights||3===t.editRights?e("div",{staticClass:"d-flex justify-content-end"},[e("router-link",{staticClass:"btn btn-primary",attrs:{to:"/company/edit"}},[e("font-awesome-icon",{attrs:{icon:"pen"}})],1),e("router-link",{staticClass:"btn btn-primary",attrs:{to:"/company/settings/profile"}},[e("font-awesome-icon",{attrs:{icon:"cog"}})],1)],1):t._e()]),e("div",{staticClass:"row justify-content-center py-2",attrs:{id:"coupon-container"}},t._l(t.coupons,(function(t,o){return e("coupon",{key:o,staticClass:"col-sm-6 col-md-4 col-xl-3",attrs:{coupon:t}},[e("font-awesome-icon",{staticStyle:{position:"absolute",left:"9.5px",top:"10.5px"},attrs:{slot:"actionIcon",icon:"shopping-cart"},slot:"actionIcon"})],1)})),1)])},n=[],a=e("f43e"),i=e("ecee"),c=e("c074");i["c"].add(c["A"],c["u"]);var r={name:"RabattMenu",components:{Coupon:a["a"]},data:function(){return{editRights:0,coupons:[]}},mounted:function(){this.getData()},methods:{getData:function(){var t=this;this.$http.post(this.$store.state.url+"/getRabatt",{hash:this.$store.state.user.token?this.$store.state.user.token:void 0,firmenname:this.$store.state.company.companyName}).then((function(o){console.debug("Coupons:",o),t.coupons=o.data.coupons,t.editRights=o.data.editRights}))}}},l=r,u=(e("2d0a"),e("2877")),p=Object(u["a"])(l,s,n,!1,null,"7a5f34ea",null);o["default"]=p.exports},"2d0a":function(t,o,e){"use strict";var s=e("a9f8"),n=e.n(s);n.a},"5b87":function(t,o,e){"use strict";var s=e("b058"),n=e.n(s);n.a},"61c8":function(t,o,e){},"714b":function(t,o,e){"use strict";var s=function(){var t=this,o=t.$createElement,e=t._self._c||o;return e("div",{staticClass:"modal fade",attrs:{tabindex:"-1",role:"dialog","aria-labelledby":"modalCreateNewCoupon","aria-hidden":"true"}},[e("div",{staticClass:"modal-dialog modal-dialog-centered",attrs:{role:"document"}},[e("div",{staticClass:"modal-content"},[e("div",{staticClass:"modal-header"},[e("h5",{staticClass:"modal-title",attrs:{id:"exampleModalLongTitle"}},[t._v(t._s(t.title))]),t._m(0)]),e("div",{staticClass:"modal-body"},[t._t("default")],2)])])])},n=[function(){var t=this,o=t.$createElement,e=t._self._c||o;return e("button",{staticClass:"close",attrs:{type:"button","data-dismiss":"modal","aria-label":"Close"}},[e("span",{attrs:{"aria-hidden":"true"}},[t._v("×")])])}],a={name:"Modal",props:["title"]},i=a,c=e("2877"),r=Object(c["a"])(i,s,n,!1,null,"74403a3e",null);o["a"]=r.exports},a9f8:function(t,o,e){},b058:function(t,o,e){},f17f:function(t,o,e){"use strict";var s=e("61c8"),n=e.n(s);n.a},f43e:function(t,o,e){"use strict";var s=function(){var t=this,o=t.$createElement,e=t._self._c||o;return e("div",{staticClass:"coupon"},[e("button",{staticClass:"card",on:{click:t.showActionModal}},[e("div",{staticClass:"card-body text-left d-flex flex-column justify-content-between pb-1"},[e("div",[e("h4",{staticClass:"font-weight-bold"},[t._v(t._s(this.coupon.title))]),e("p",[t._v(t._s(this.coupon.text))])]),e("footer",{staticClass:"d-flex flex-row justify-content-between"},[e("div",[e("h4",{staticClass:"font-weight-bold text-nowrap"},[t._v(" "+t._s(t.coupon.isPercent?!(this.coupon.percentage>0)||this.coupon.percentage>=100?"Gratis":"-"+this.coupon.percentage+"%":!(this.coupon.price>0)||this.coupon.price>=100?"Gratis":"-"+this.coupon.price+"€")+" ")])]),e("h4",{staticClass:"primary-text font-weight-bold text-nowrap"},[t._v(t._s(this.coupon.value+" FP"))])])]),t.$slots.actionIcon?e("div",{staticClass:"control-buttons"},[t.$slots.actionIcon?e("button",{staticClass:"btn btn-primary btn-action",on:{click:t.showActionModal}},[t._t("actionIcon")],2):t._e()]):t._e()]),e("modal",{attrs:{id:"modalActionCoupon"+t.coupon.id}},[t._t("modal",[e("coupon-detail",{attrs:{coupon:t.coupon}})])],2)],1)},n=[],a=e("714b"),i=function(){var t=this,o=t.$createElement,e=t._self._c||o;return e("div",{staticClass:"container"},[e("h2",[t._v(t._s(t.coupon.title))]),e("h3",{staticClass:"font-weight-bold"},[t._v(" "+t._s(t.isPercent?!(this.coupon.percentage>0)||this.coupon.percentage>=100?"Gratis":"-"+this.coupon.percentage+"%":!(this.coupon.price>0)||this.coupon.price>=100?"Gratis":"-"+this.coupon.price+"€")+" ")]),e("i",{staticClass:"fas fa-qrcode fa-10x rounded-circle",attrs:{id:"qr-code"}}),t.show?t._e():e("h6",{on:{click:function(o){t.show=!0}}},[t._v("mehr anzeigen")]),t.show?e("h6",[t._v("_R1-AT2_haude-registrierkasse-67_9464_2017-01-01......")]):t._e()])},c=[],r={name:"CouponDetail",props:["coupon"],data:function(){return{show:!1,isPercent:!0,title:"",text:"",price:0,percentage:0,value:0}},created:function(){this.coupon&&this.resetData()},methods:{resetData:function(){this.isPercent=this.coupon.isPercent,this.title=this.coupon.title,this.text=this.coupon.text,this.price=this.coupon.price,this.percentage=this.coupon.percentage,this.value=this.coupon.value}}},l=r,u=(e("f17f"),e("2877")),p=Object(u["a"])(l,i,c,!1,null,"20f23bee",null),d=p.exports,h={name:"Coupon",components:{CouponDetail:d,Modal:a["a"]},props:["coupon"],methods:{showActionModal:function(){this.$store.state.user.token?this.$("#modalActionCoupon"+this.coupon.id).modal():this.$router.push("/login")}}},f=h,m=(e("5b87"),Object(u["a"])(f,s,n,!1,null,"86b5f232",null));o["a"]=m.exports}}]);
//# sourceMappingURL=chunk-31704000.5bd581bc.js.map