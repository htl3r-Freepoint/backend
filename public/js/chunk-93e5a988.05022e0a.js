(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-93e5a988","chunk-0e5efada"],{"0068":function(t,e,s){"use strict";var a=s("73b7"),n=s.n(a);n.a},"116e":function(t,e,s){"use strict";var a=s("3f23"),n=s.n(a);n.a},2081:function(t,e,s){},"218b":function(t,e,s){"use strict";s.r(e);var a=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"container"},[s("div",{staticClass:"d-flex justify-content-between"},[s("h2",{staticClass:"text-uppercase font-weight-bold"},[t._v(" "+t._s(t.$store.state.company.companyName?t.$store.state.company.companyName:"ERROR: no Company selected")+" ")]),2===t.editRights||3===t.editRights?s("div",{staticClass:"d-flex justify-content-end"},[s("router-link",{staticClass:"btn btn-primary",attrs:{to:"/company/coupons/edit"}},[s("font-awesome-icon",{attrs:{icon:"pen"}})],1),s("router-link",{staticClass:"btn btn-primary",attrs:{to:"/company/settings/profile"}},[s("font-awesome-icon",{attrs:{icon:"cog"}})],1)],1):t._e()]),s("div",{staticClass:"row justify-content-center py-2",attrs:{id:"coupon-container"}},t._l(t.$store.state.coupons,(function(e,a){return s("coupon",{key:a,staticClass:"col-sm-6 col-md-4 col-xl-3",attrs:{coupon:e}},[s("font-awesome-icon",{staticStyle:{position:"absolute",left:"9.5px",top:"10.5px"},attrs:{slot:"actionIcon",icon:"shopping-cart"},slot:"actionIcon"}),s("div",{staticClass:"container",attrs:{slot:"modal"},slot:"modal"},[s("h2",[t._v(t._s(e.title))]),s("p",{staticClass:"text-left"},[t._v(t._s(e.text))]),s("div",{staticClass:"d-flex flex-row justify-content-between w-50 m-auto"},[s("h3",{staticClass:"font-weight-bold"},[t._v(" "+t._s(e.isPercent?!(e.percentage>0)||e.percentage>=100?"Gratis":"-"+e.percentage+"%":!(e.price>0)||e.price>=100?"Gratis":"-"+e.price+"€")+" ")]),s("h3",{staticClass:"primary-text"},[t._v(" "+t._s(e.value)+" "),s("font-awesome-icon",{attrs:{icon:"receipt"}})],1)]),s("div",{staticClass:"container"},[s("div",{staticClass:"row control-buttons justify-content-between"},[s("button",{staticClass:"col-5 btn btn-danger font-weight-bold",attrs:{type:"button","data-dismiss":"modal"}},[t._v("Zurück")]),s("button",{staticClass:"col-5 btn btn-primary font-weight-bold",attrs:{type:"button","data-dismiss":"modal"}},[t._v("Kaufen")])])])])],1)})),1)])},n=[],o=s("f43e"),r=s("ecee"),i=s("c074");r["c"].add(i["B"],i["v"],i["z"]);var c={name:"RabattMenu",components:{Coupon:o["a"]},data:function(){return{editRights:0,coupons:[]}},mounted:function(){this.getData()},methods:{getData:function(){var t=this;console.debug("Company:",this.$store.state.company.companyName),this.$http.post(this.$store.state.url+"/getRabatt",{hash:this.$store.state.user.token?this.$store.state.user.token:void 0,firmenname:this.$store.state.company.companyName}).then((function(e){console.debug("Coupons:",e),t.$store.commit("setCoupons",e.data.coupons),t.editRights=e.data.editRights}))}}},l=c,d=(s("116e"),s("2877")),u=Object(d["a"])(l,a,n,!1,null,"f3c4b632",null);e["default"]=u.exports},2622:function(t,e,s){},2674:function(t,e,s){},2934:function(t,e,s){"use strict";var a=s("c934"),n=s.n(a);n.a},"3f23":function(t,e,s){},"5a71":function(t,e,s){},"714b":function(t,e,s){"use strict";var a=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"modal fade",attrs:{tabindex:"-1",role:"dialog","aria-labelledby":"modalCreateNewCoupon","aria-hidden":"true"}},[s("div",{staticClass:"modal-dialog modal-dialog-centered",attrs:{role:"document"}},[s("div",{staticClass:"modal-content"},[s("div",{staticClass:"modal-header"},[s("h5",{staticClass:"modal-title",attrs:{id:"exampleModalLongTitle"}},[t._v(t._s(t.title))]),t._m(0)]),s("div",{staticClass:"modal-body"},[t._t("default")],2)])])])},n=[function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("button",{staticClass:"close",attrs:{type:"button","data-dismiss":"modal","aria-label":"Close"}},[s("span",{attrs:{"aria-hidden":"true"}},[t._v("×")])])}],o={name:"Modal",props:["title"]},r=o,i=s("2877"),c=Object(i["a"])(r,a,n,!1,null,"74403a3e",null);e["a"]=c.exports},"73b7":function(t,e,s){},"78de":function(t,e,s){"use strict";s.r(e);var a=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",[void 0===this.$store.state.company.companyName?s("div",{staticClass:"container-fluid"},[t._m(0),s("divider",{staticClass:"row"}),s("div",{staticClass:"row p-5 justify-content-around",attrs:{id:"forms"}},[s("div",{staticClass:"col-md-4 mb-5"},[s("h1",{staticClass:"mb-4 form-header"},[t._v("Anmelden")]),s("form-login",{staticClass:"shadow-lg p-3 bg-white rounded"})],1),s("div",{staticClass:"col-md-4"},[s("h1",{staticClass:"mb-4 form-header"},[t._v("Registrieren")]),s("form-register-user",{staticClass:"shadow-lg p-3 bg-white rounded"})],1)]),s("svg",{staticClass:"row",attrs:{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 1000 100",preserveAspectRatio:"none"}},[s("path",{staticClass:"elementor-shape-fill",attrs:{d:"M761.9,44.1L643.1,27.2L333.8,98L0,3.8V0l1000,0v3.9"}})]),s("div",{staticClass:"row m-5",attrs:{id:"faq"}},[s("FaqElement",{staticClass:"col-md-3 col-sm-6",scopedSlots:t._u([{key:"icon",fn:function(){return[s("font-awesome-icon",{staticClass:"fa-5x faq-icon",attrs:{icon:"download"}})]},proxy:!0},{key:"headline",fn:function(){return[t._v("Einfacher geht´s nicht!")]},proxy:!0},{key:"text",fn:function(){return[t._v("Erstellen Sie einen Account. Definieren Sie Ihre Gutscheine und Rabatte. Fertig! Nun können Ihre Kunden Ihre App herunterladen. ")]},proxy:!0}],null,!1,2389630560)}),s("FaqElement",{staticClass:"col-md-3 col-sm-6",scopedSlots:t._u([{key:"icon",fn:function(){return[s("font-awesome-icon",{staticClass:"fa-5x faq-icon",attrs:{icon:"lock"}})]},proxy:!0},{key:"headline",fn:function(){return[t._v("Sicherer und billiger!")]},proxy:!0},{key:"text",fn:function(){return[t._v("Aufwendige Stempelkarten sind Geschichte! Mit dieser App können Ihre Kunden ganz einfach den QR-Code auf deren Rechnung scannen und damit Punkte sammeln. ")]},proxy:!0}],null,!1,3105606341)}),s("FaqElement",{staticClass:"col-md-3 col-sm-6",scopedSlots:t._u([{key:"icon",fn:function(){return[s("font-awesome-icon",{staticClass:"fa-5x faq-icon",attrs:{icon:"chart-pie"}})]},proxy:!0},{key:"headline",fn:function(){return[t._v("Kundenstatistiken!")]},proxy:!0},{key:"text",fn:function(){return[t._v("Freepoint informiert Sie über das Kaufverhalten Ihrer Kunden. Damit können Sie Ihre Marketingstrategie optimieren. ")]},proxy:!0}],null,!1,3421123233)}),s("FaqElement",{staticClass:"col-md-3 col-sm-6",scopedSlots:t._u([{key:"icon",fn:function(){return[s("font-awesome-icon",{staticClass:"fa-5x faq-icon",attrs:{icon:"mobile"}})]},proxy:!0},{key:"headline",fn:function(){return[t._v("App herunterladen und los geht's!")]},proxy:!0},{key:"text",fn:function(){return[t._v("Holen Sie sich die App auf Ihr Handy und erstellen Sie Ihre ersten Angebote.")]},proxy:!0}],null,!1,962565223)})],1),s("divider",{staticClass:"row"}),s("Footer",{staticClass:"row"})],1):s("div",[s("RabattMenu")],1)])},n=[function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("div",{staticClass:"row justify-content-center align-content-center text-left",attrs:{id:"banner"}},[a("div",{staticClass:"col-md-5"},[a("h1",{staticClass:"heading"},[t._v("Erstellen Sie Ihre eigene Gutschein-App!")]),a("hr"),a("p",{staticClass:"heading-sub"},[t._v("Passen Sie mit FreePoint einfach und schnell Ihre eigene Gutschein-App an! Oder genießen Sie als Kunde alle Vorteile der Rabatte!")])]),a("div",{staticClass:"col-md-6"},[a("div",{staticClass:"carousel slide",attrs:{id:"carouselExampleIndicators","data-ride":"carousel","data-interval":"false"}},[a("div",{staticClass:"carousel-inner"},[a("div",{staticClass:"carousel-item active"},[a("div",{staticClass:"embed-responsive embed-responsive-16by9"},[a("iframe",{attrs:{width:"560",height:"315",src:"https://www.youtube.com/embed/JxS_LZZdyJ4",frameborder:"0",allow:"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture",allowfullscreen:""}})])]),a("div",{staticClass:"carousel-item"},[a("img",{attrs:{src:s("ba47"),alt:"Second slide"}})]),a("div",{staticClass:"carousel-item"},[a("img",{attrs:{src:s("7ec9"),alt:"Third slide"}})])]),a("a",{staticClass:"carousel-control-prev",attrs:{href:"#carouselExampleIndicators",role:"button","data-slide":"prev"}},[a("span",{staticClass:"carousel-control-prev-icon",attrs:{"aria-hidden":"true"}}),a("span",{staticClass:"sr-only"},[t._v("Previous")])]),a("a",{staticClass:"carousel-control-next",attrs:{href:"#carouselExampleIndicators",role:"button","data-slide":"next"}},[a("span",{staticClass:"carousel-control-next-icon",attrs:{"aria-hidden":"true"}}),a("span",{staticClass:"sr-only"},[t._v("Next")])])])])])}],o=s("218b"),r=s("9acf"),i=s("9b34"),c=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("svg",{attrs:{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 1000 100",preserveAspectRatio:"none"}},[s("path",{staticClass:"elementor-shape-fill",attrs:{d:"M761.9,40.6L643.1,24L333.9,93.8L0.1,1H0v99h1000V1"}})])},l=[],d={name:"divider"},u=d,p=(s("ce68"),s("2877")),m=Object(p["a"])(u,c,l,!1,null,"5a58d4ac",null),f=m.exports,h=s("fd2d"),v=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"mb-5"},[t._t("icon"),s("p",{attrs:{id:"faq-headline"}},[t._t("headline")],2),s("p",{attrs:{id:"faq-text"}},[t._t("text")],2)],2)},g=[],b={name:"FaqElement"},w=b,C=(s("0068"),Object(p["a"])(w,v,g,!1,null,"5be44c06",null)),y=C.exports,_=s("ecee"),x=s("c074");_["c"].add(x["e"],x["t"],x["k"],x["s"]);var k={name:"Root",components:{FaqElement:y,Footer:h["a"],Divider:f,FormRegisterUser:i["a"],FormLogin:r["a"],RabattMenu:o["default"]}},S=k,$=(s("2934"),Object(p["a"])(S,a,n,!1,null,"0ec1b2d9",null));e["default"]=$.exports},"7ec9":function(t,e,s){t.exports=s.p+"img/Kunden.c797b514.png"},9377:function(t,e,s){"use strict";var a=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"form-group"},[s("label",{staticClass:"font-weight-bold d-block text-left"},[t._v(t._s(t.label)+" "),s("div",{staticClass:"input-group mt-2"},[t.$slots.prepend?s("span",{staticClass:"input-group-prepend"},[s("span",{staticClass:"input-group-text"},[t._t("prepend")],2)]):t._e(),t._t("default",[s("input",{staticClass:"form-control border-danger",staticStyle:{"border-width":"3px"},attrs:{disabled:"",placeholder:"please fill in a <input>"}})])],2)]),s("small",{staticClass:"form-text text-muted text-left"},[t._v(t._s(t.description))])])},n=[],o={name:"RegisterInput",props:["description","label"]},r=o,i=(s("dfdd"),s("2877")),c=Object(i["a"])(r,a,n,!1,null,"3d7687b0",null);e["a"]=c.exports},"9acf":function(t,e,s){"use strict";var a=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("form",[s("register-input",{attrs:{title:"Email"}},[s("font-awesome-icon",{attrs:{slot:"prepend",icon:"at"},slot:"prepend"}),s("input",{directives:[{name:"model",rawName:"v-model",value:t.email,expression:"email"}],staticClass:"form-control",attrs:{type:"email",id:"inputLoginEmail",placeholder:"E-Mail-Adresse",required:""},domProps:{value:t.email},on:{input:function(e){e.target.composing||(t.email=e.target.value)}}})],1),s("register-input",{attrs:{title:"Password"}},[s("font-awesome-icon",{attrs:{slot:"prepend",icon:"key"},slot:"prepend"}),s("input",{directives:[{name:"model",rawName:"v-model",value:t.password,expression:"password"}],staticClass:"form-control",attrs:{type:"password",placeholder:"Passwort"},domProps:{value:t.password},on:{input:function(e){e.target.composing||(t.password=e.target.value)}}})],1),s("div",{staticClass:"form-group form-check"},[s("label",[s("input",{directives:[{name:"model",rawName:"v-model",value:t.remember,expression:"remember"}],staticClass:"form-check-input",attrs:{type:"checkbox"},domProps:{checked:Array.isArray(t.remember)?t._i(t.remember,null)>-1:t.remember},on:{change:function(e){var s=t.remember,a=e.target,n=!!a.checked;if(Array.isArray(s)){var o=null,r=t._i(s,o);a.checked?r<0&&(t.remember=s.concat([o])):r>-1&&(t.remember=s.slice(0,r).concat(s.slice(r+1)))}else t.remember=n}}}),t._v(" Remember me ")])]),s("button",{staticClass:"btn btn-primary",attrs:{type:"button",disabled:!t.email&&!t.password},on:{click:function(e){return t.login()}}},[t._v("Anmelden")])],1)},n=[],o=s("9377"),r=s("ecee"),i=s("c074");r["c"].add(i["a"],i["r"]);var c={name:"FormLogin",components:{RegisterInput:o["a"]},props:{overwritePathRedirect:Boolean},data:function(){return{email:"",password:"",remember:!1}},methods:{login:function(){var t=this;this.email&&this.password?this.$http.post(this.$store.state.url+"/loginUser",{email:this.email,password:this.password}).then((function(e){console.debug("Saving user login"),t.remember?localStorage.setItem("user",JSON.stringify(e.data)):localStorage.removeItem("user"),t.$store.commit("setUser",e.data),console.debug("User:",t.$store.state.user),console.debug("Saving Complete","Moving User to old Path"),t.overwritePathRedirect||(window.history.length>1?t.$router.go(-1):t.$router.push({path:"/"}))})).catch((function(e){console.debug("Config:",e),t.password=void 0})):console.log("Login information incomplete")}}},l=c,d=(s("fb3d"),s("2877")),u=Object(d["a"])(l,a,n,!1,null,"4055a516",null);e["a"]=u.exports},"9b34":function(t,e,s){"use strict";var a=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("form",[s("register-input",[s("font-awesome-icon",{attrs:{slot:"prepend",icon:"user"},slot:"prepend"}),s("input",{directives:[{name:"model",rawName:"v-model",value:t.name,expression:"name"}],staticClass:"form-control",attrs:{type:"text",id:"inputRegisterUsername",placeholder:"Benutzername",autocomplete:"username",required:""},domProps:{value:t.name},on:{input:function(e){e.target.composing||(t.name=e.target.value)}}})],1),s("register-input",{attrs:{description:"Wir werden Ihre E-Mail-Adresse nicht weiterleiten."}},[s("font-awesome-icon",{attrs:{slot:"prepend",icon:"at"},slot:"prepend"}),s("input",{directives:[{name:"model",rawName:"v-model",value:t.email,expression:"email"}],staticClass:"form-control",attrs:{type:"email",id:"inputRegisterEmail",placeholder:"E-Mail-Adresse",required:""},domProps:{value:t.email},on:{input:function(e){e.target.composing||(t.email=e.target.value)}}})],1),s("register-input",[s("font-awesome-icon",{attrs:{slot:"prepend",icon:"key"},slot:"prepend"}),s("input",{directives:[{name:"model",rawName:"v-model",value:t.password,expression:"password"}],staticClass:"form-control",attrs:{type:"password",id:"inputRegisterPassword",placeholder:"Passwort",autocomplete:"new-password",required:""},domProps:{value:t.password},on:{input:function(e){e.target.composing||(t.password=e.target.value)}}})],1),s("register-input",[s("font-awesome-icon",{attrs:{slot:"prepend",icon:"key"},slot:"prepend"}),s("input",{directives:[{name:"model",rawName:"v-model",value:t.passwordConfirm,expression:"passwordConfirm"}],staticClass:"form-control",attrs:{type:"password",id:"inputRegisterPasswordConfirm",placeholder:"Passwort bestätigen",autocomplete:"new-password",required:""},domProps:{value:t.passwordConfirm},on:{input:function(e){e.target.composing||(t.passwordConfirm=e.target.value)}}})],1),s("div",{staticClass:"form-group form-check"},[s("input",{directives:[{name:"model",rawName:"v-model",value:t.TOS,expression:"TOS"}],staticClass:"form-check-input",attrs:{type:"checkbox",id:"inputRegisterTOS",required:""},domProps:{checked:Array.isArray(t.TOS)?t._i(t.TOS,null)>-1:t.TOS},on:{change:function(e){var s=t.TOS,a=e.target,n=!!a.checked;if(Array.isArray(s)){var o=null,r=t._i(s,o);a.checked?r<0&&(t.TOS=s.concat([o])):r>-1&&(t.TOS=s.slice(0,r).concat(s.slice(r+1)))}else t.TOS=n}}}),s("label",{attrs:{for:"inputRegisterTOS"}},[t._v(" Durch Ankreuzen dieser Option akzeptieren Sie unsere "),s("router-link",{attrs:{to:"/terms-and-service"}},[t._v("Nutzungsbedingungen.")])],1)]),s("button",{staticClass:"btn btn-primary",attrs:{type:"button",disabled:!t.TOS&&!t.email&&!t.password&&!t.passwordConfirm},on:{click:function(e){return t.register()}}},[t._v("Registrieren ")])],1)},n=[],o=(s("b0c0"),s("9377")),r=s("ecee"),i=s("c074");r["c"].add(i["a"],i["r"],i["G"]);var c={name:"FormRegisterUser",components:{RegisterInput:o["a"]},props:{overwritePathRedirect:Boolean},data:function(){return{email:"",password:"",passwordConfirm:"",name:"",TOS:!1}},methods:{register:function(){var t=this;this.email&&this.password&&this.passwordConfirm&&this.TOS?this.password===this.passwordConfirm?this.$http.post(this.$store.state.url+"/registerUser",{email:this.email,password:this.password,username:this.name}).then((function(e){console.debug("Response:",e.data),console.debug("Saving user login"),localStorage.removeItem("user"),t.$store.commit("setUser",e.data),console.debug("Token:",t.$store.state.user),t.overwritePathRedirect||(window.history.length>1?t.$router.go(-1):t.$router.push({path:"/"}))})).catch((function(t){t.response?(console.debug("Data:",t.response.data),console.debug("Status:",t.response.status),console.debug("Headers:",t.response.headers)):t.request?console.debug("Request:",t.request):console.debug("Error:",t.message),console.debug("Config:",t.config)})):console.log("The repeated password must be equal"):console.log("Form incomplete",[this.email,this.password,this.passwordConfirm,this.TOS])}}},l=c,d=(s("cfa8"),s("2877")),u=Object(d["a"])(l,a,n,!1,null,"0ffd18dd",null);e["a"]=u.exports},"9cba":function(t,e,s){"use strict";var a=s("df73"),n=s.n(a);n.a},b0c0:function(t,e,s){var a=s("83ab"),n=s("9bf2").f,o=Function.prototype,r=o.toString,i=/^\s*function ([^ (]*)/,c="name";a&&!(c in o)&&n(o,c,{configurable:!0,get:function(){try{return r.call(this).match(i)[1]}catch(t){return""}}})},ba47:function(t,e,s){t.exports=s.p+"img/Geschafte.611088b2.png"},c203:function(t,e,s){},c934:function(t,e,s){},ce68:function(t,e,s){"use strict";var a=s("2081"),n=s.n(a);n.a},cfa8:function(t,e,s){"use strict";var a=s("2674"),n=s.n(a);n.a},df73:function(t,e,s){},dfdd:function(t,e,s){"use strict";var a=s("2622"),n=s.n(a);n.a},f43e:function(t,e,s){"use strict";var a=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"coupon"},[s("button",{staticClass:"card",on:{click:t.showActionModal}},[s("div",{staticClass:"card-body text-left d-flex flex-column justify-content-between pb-1"},[s("div",[s("h4",{staticClass:"font-weight-bold"},[t._v(t._s(this.coupon.title))]),s("p",[t._v(t._s(this.coupon.text))])]),s("footer",{staticClass:"d-flex flex-row justify-content-between"},[s("div",[s("h4",{staticClass:"font-weight-bold text-nowrap"},[t._v(" "+t._s(t.coupon.isPercent?!(this.coupon.percentage>0)||this.coupon.percentage>=100?"Gratis":"-"+this.coupon.percentage+"%":!(this.coupon.price>0)||this.coupon.price>=100?"Gratis":"-"+this.coupon.price+"€")+" ")])]),s("h4",{staticClass:"primary-text font-weight-bold text-nowrap"},[t._v(t._s(this.coupon.value))])])]),t.$slots.actionIcon?s("div",{staticClass:"control-buttons"},[t.$slots.actionIcon?s("button",{staticClass:"btn btn-primary btn-action",on:{click:t.showActionModal}},[t._t("actionIcon")],2):t._e()]):t._e()]),t.$slots.modal?s("modal",{attrs:{id:"modalActionCoupon"+t.coupon.id}},[t._t("modal")],2):t._e()],1)},n=[],o=s("714b"),r={name:"Coupon",components:{Modal:o["a"]},props:["coupon"],methods:{showActionModal:function(){this.$store.state.user.token?this.$("#modalActionCoupon"+this.coupon.id).modal():this.$router.push("/login")}}},i=r,c=(s("9cba"),s("2877")),l=Object(c["a"])(i,a,n,!1,null,"957334de",null);e["a"]=l.exports},fb3d:function(t,e,s){"use strict";var a=s("5a71"),n=s.n(a);n.a},fbe2:function(t,e,s){"use strict";var a=s("c203"),n=s.n(a);n.a},fd2d:function(t,e,s){"use strict";var a=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("footer",{staticClass:"d-flex justify-content-around py-3"},[s("div",[t._v("Ein Projekt der HTL Rennweg.")]),s("div",[t._v("Copyright © 2021 Freepoint | Powered by Freepoint")]),s("div",[s("router-link",{staticClass:"router-link",attrs:{to:"/imprint"}},[t._v(" Impressum ")]),t._v(" | "),s("router-link",{staticClass:"router-link",attrs:{to:"/privacy-policy"}},[t._v(" Datenschutzerklärung ")])],1)])},n=[],o={name:"Footer"},r=o,i=(s("fbe2"),s("2877")),c=Object(i["a"])(r,a,n,!1,null,"eec603ae",null);e["a"]=c.exports}}]);
//# sourceMappingURL=chunk-93e5a988.05022e0a.js.map