(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-45d3639a","chunk-00acb6eb"],{"0068":function(e,t,s){"use strict";var a=s("73b7"),n=s.n(a);n.a},"055b":function(e,t,s){"use strict";var a=s("0b1a"),n=s.n(a);n.a},"0b1a":function(e,t,s){},2081:function(e,t,s){},"218b":function(e,t,s){"use strict";s.r(t);var a=function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("div",{staticClass:"container"},[s("div",{staticClass:"d-flex justify-content-between pb-5 row"},[s("h2",{staticClass:"text-uppercase font-weight-bold col-sm  mt-3"},[e._v(" "+e._s(e.$store.state.company.companyName?e.$store.state.company.companyName:"ERROR: no Company selected")+" ")]),s("div",{staticClass:"d-flex justify-content-end col-sm mt-3"},[s("div",[e.editRights>0?s("router-link",{staticClass:"btn btn-primary",attrs:{to:"/cashier"}},[s("font-awesome-icon",{attrs:{icon:"qrcode"}})],1):e._e(),2===e.editRights||3===e.editRights?s("router-link",{staticClass:"btn btn-primary mx-2",attrs:{to:"/company/coupons/edit"}},[s("font-awesome-icon",{attrs:{icon:"pen"}})],1):e._e(),2===e.editRights||3===e.editRights?s("router-link",{staticClass:"btn btn-primary",attrs:{to:"/company/settings/profile"}},[s("font-awesome-icon",{attrs:{icon:"cog"}})],1):e._e()],1)])]),s("div",{staticClass:"row justify-content-center py-2",attrs:{id:"coupon-container"}},e._l(e.$store.state.coupons,(function(t,a){return s("coupon",{key:a,staticClass:"col-sm-6 col-md-4 col-xl-3",attrs:{coupon:t}},[s("font-awesome-icon",{staticStyle:{position:"absolute",left:"9.5px",top:"10.5px"},attrs:{slot:"actionIcon",icon:"shopping-cart"},slot:"actionIcon"}),s("div",{staticClass:"container",attrs:{slot:"modal"},slot:"modal"},[s("h2",[e._v(e._s(t.title))]),s("p",{staticClass:"text-left"},[e._v(e._s(t.text))]),s("div",{staticClass:"d-flex flex-row justify-content-between w-50 m-auto"},[s("h3",{staticClass:"font-weight-bold"},[e._v(" "+e._s(t.isPercent?!(t.percentage>0)||t.percentage>=100?"Gratis":"-"+t.percentage+"%":!(t.price>0)||t.price>=100?"Gratis":"-"+t.price+"€")+" ")]),s("h3",{staticClass:"primary-text"},[e._v(" "+e._s(t.value)+" "),s("font-awesome-icon",{attrs:{icon:"receipt"}})],1)]),s("div",{staticClass:"container"},[s("div",{staticClass:"row control-buttons justify-content-between"},[s("button",{staticClass:"col-5 btn btn-danger font-weight-bold",attrs:{type:"button","data-dismiss":"modal"}},[e._v("Zurück")]),s("button",{staticClass:"col-5 btn btn-primary font-weight-bold",attrs:{type:"button","data-dismiss":"modal",disabled:e.$store.state.points<t.value},on:{click:function(s){return e.buyCoupon(t.id)}}},[e._v("Kaufen ")])])])])],1)})),1),s("modal",{attrs:{id:"lastCoupon"}},[s("vue-qr-code",{attrs:{value:e.lastCoupon.code}})],1)],1)},n=[],o=s("f43e"),r=s("714b"),i=s("9a13"),c=s("ecee"),l=s("c074");c["c"].add(l["D"],l["w"],l["A"],l["y"]);var u={name:"RabattMenu",components:{Coupon:o["a"],Modal:r["a"],VueQrCode:i["a"]},data:function(){return{editRights:0,coupons:[],lastCoupon:{code:"no Coupon Provided"}}},mounted:function(){this.getData()},methods:{getData:function(){var e=this;console.debug("Company:",this.$store.state.company.companyName),this.$http.post(this.$store.state.url+"/getRabatt",{hash:this.$store.state.user.token?this.$store.state.user.token:void 0,firmenname:this.$store.state.company.companyName}).then((function(t){console.debug("Coupons:",t),e.$store.commit("setCoupons",t.data.coupons),e.editRights=t.data.editRights}))},buyCoupon:function(e){var t=this;this.$http.post(this.$store.state.url+"/buyCoupon",{hash:this.$store.state.user.token?this.$store.state.user.token:void 0,firmenname:this.$store.state.company.companyName,rabattID:e}).then((function(e){console.debug(e),t.$store.commit("setPoints",e.data.points),t.lastCoupon=e.data.coupon,t.$("#lastCoupon").modal()}))}}},d=u,p=(s("e03d"),s("2877")),m=Object(p["a"])(d,a,n,!1,null,"0b335455",null);t["default"]=m.exports},2537:function(e,t,s){},2622:function(e,t,s){},"34c2":function(e,t,s){},"526d":function(e,t,s){"use strict";var a=function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("form",[s("register-input",[s("font-awesome-icon",{attrs:{slot:"prepend",icon:"user"},slot:"prepend"}),s("input",{directives:[{name:"model",rawName:"v-model",value:e.companyName,expression:"companyName"}],staticClass:"form-control",attrs:{type:"text",id:"inputRegisterName",placeholder:"Geschäftsname",autocomplete:"Geschäftsname",required:""},domProps:{value:e.companyName},on:{input:function(t){t.target.composing||(e.companyName=t.target.value)}}})],1),s("register-input",{attrs:{description:"Wir werden Ihre E-Mail-Adresse nicht weiterleiten."}},[s("font-awesome-icon",{attrs:{slot:"prepend",icon:"at"},slot:"prepend"}),s("input",{directives:[{name:"model",rawName:"v-model",value:e.email,expression:"email"}],staticClass:"form-control",attrs:{type:"email",id:"inputRegisterEmail",placeholder:"E-Mail-Adresse",required:""},domProps:{value:e.email},on:{input:function(t){t.target.composing||(e.email=t.target.value)}}})],1),s("div",{staticClass:"form-group form-check"},[s("input",{directives:[{name:"model",rawName:"v-model",value:e.TOS,expression:"TOS"}],staticClass:"form-check-input",attrs:{type:"checkbox",id:"inputRegisterTOS",required:""},domProps:{checked:Array.isArray(e.TOS)?e._i(e.TOS,null)>-1:e.TOS},on:{change:function(t){var s=e.TOS,a=t.target,n=!!a.checked;if(Array.isArray(s)){var o=null,r=e._i(s,o);a.checked?r<0&&(e.TOS=s.concat([o])):r>-1&&(e.TOS=s.slice(0,r).concat(s.slice(r+1)))}else e.TOS=n}}}),s("label",{attrs:{for:"inputRegisterTOS"}},[e._v("Durch Ankreuzen dieser Option akzeptieren Sie unsere "),s("router-link",{attrs:{to:"/terms-and-service"}},[e._v("Nutzungsbedingungen.")])],1)]),s("button",{staticClass:"btn btn-primary",attrs:{type:"button",disabled:!e.email&&!e.companyName&&!e.TOS},on:{click:function(t){return e.register()}}},[e._v(" Erstellen ")])],1)},n=[],o=(s("b0c0"),s("9377")),r=s("ecee"),i=s("c074");r["c"].add(i["a"],i["I"]);var c={name:"FormRegisterCompany",components:{RegisterInput:o["a"]},data:function(){return{email:"",companyName:"",TOS:!1}},methods:{register:function(){this.email&&this.companyName&&this.TOS?this.$http.post(this.$store.state.url+"/registerCompany",{name:this.companyName,email:this.email,hash:this.$store.state.user.token}).then((function(e){console.debug(e),e.data.company&&(window.location.href=e.data.company.name+".localhost:8080")})).catch((function(e){e.response?(console.debug("Data:",e.response.data),console.debug("Status:",e.response.status),console.debug("Headers:",e.response.headers)):e.request?console.debug("Request:",e.request):console.debug("Error:",e.message),console.debug("Config:",e.config)})):console.log("Please fill all required fields in the form")}}},l=c,u=s("2877"),d=Object(u["a"])(l,a,n,!1,null,"46a2f03a",null);t["a"]=d.exports},"5a71":function(e,t,s){},"73b7":function(e,t,s){},"78de":function(e,t,s){"use strict";s.r(t);var a=function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("div",[void 0===this.$store.state.company.companyName?s("div",{staticClass:"container-fluid"},[e._m(0),s("divider",{staticClass:"row"}),s("div",{staticClass:"row p-5 justify-content-around",attrs:{id:"forms"}},[s("div",{staticClass:"col-md-4 mb-5"},[this.$store.state.user.token&&this.$store.state.user.verified?s("div",[s("h1",{staticClass:"mb-4 form-header"},[e._v("Ein Geschäft erstellen")]),s("form-register-company",{staticClass:"shadow-lg p-3 bg-white rounded"})],1):this.$store.state.user.token?e._e():s("div",[s("h1",{staticClass:"mb-4 form-header"},[e._v("Anmelden")]),s("form-login",{staticClass:"shadow-lg p-3 bg-white rounded"})],1)]),s("div",{staticClass:"col-md-4"},[this.$store.state.user.token?s("div",[s("h1",{staticClass:"mb-4 form-header"},[e._v("Nach einem Geschäft suchen")]),s("div",{staticClass:"shadow-lg p-3 bg-white rounded"},[s("register-input",{attrs:{description:"Hier können Sie nach den zahlreichen Geschäften suchen, die FreePoint nutzen."}},[s("font-awesome-icon",{attrs:{slot:"prepend",icon:"search"},slot:"prepend"}),s("input",{staticClass:"form-control",attrs:{type:"search",placeholder:"Geschäft suchen","aria-label":"Search"}})],1),s("button",{staticClass:"btn btn-primary",attrs:{type:"button"}},[e._v("Suchen")])],1)]):s("div",[s("h1",{staticClass:"mb-4 form-header"},[e._v("Registrieren")]),s("form-register-user",{staticClass:"shadow-lg p-3 bg-white rounded",attrs:{"overwrite-path-redirect":!0}})],1)])]),s("svg",{staticClass:"row",attrs:{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 1000 100",preserveAspectRatio:"none"}},[s("path",{staticClass:"elementor-shape-fill",attrs:{d:"M761.9,44.1L643.1,27.2L333.8,98L0,3.8V0l1000,0v3.9"}})]),s("div",{staticClass:"row m-5",attrs:{id:"faq"}},[s("FaqElement",{staticClass:"col-md-3 col-sm-6",scopedSlots:e._u([{key:"icon",fn:function(){return[s("font-awesome-icon",{staticClass:"fa-5x faq-icon",attrs:{icon:"download"}})]},proxy:!0},{key:"headline",fn:function(){return[e._v("Einfacher geht´s nicht!")]},proxy:!0},{key:"text",fn:function(){return[e._v("Erstellen Sie einen Account. Definieren Sie Ihre Gutscheine und Rabatte. Fertig! Nun können Ihre Kunden Ihre App herunterladen. ")]},proxy:!0}],null,!1,2389630560)}),s("FaqElement",{staticClass:"col-md-3 col-sm-6",scopedSlots:e._u([{key:"icon",fn:function(){return[s("font-awesome-icon",{staticClass:"fa-5x faq-icon",attrs:{icon:"lock"}})]},proxy:!0},{key:"headline",fn:function(){return[e._v("Sicherer und billiger!")]},proxy:!0},{key:"text",fn:function(){return[e._v("Aufwendige Stempelkarten sind Geschichte! Mit dieser App können Ihre Kunden ganz einfach den QR-Code auf deren Rechnung scannen und damit Punkte sammeln. ")]},proxy:!0}],null,!1,3105606341)}),s("FaqElement",{staticClass:"col-md-3 col-sm-6",scopedSlots:e._u([{key:"icon",fn:function(){return[s("font-awesome-icon",{staticClass:"fa-5x faq-icon",attrs:{icon:"chart-pie"}})]},proxy:!0},{key:"headline",fn:function(){return[e._v("Kundenstatistiken!")]},proxy:!0},{key:"text",fn:function(){return[e._v("Freepoint informiert Sie über das Kaufverhalten Ihrer Kunden. Damit können Sie Ihre Marketingstrategie optimieren. ")]},proxy:!0}],null,!1,3421123233)}),s("FaqElement",{staticClass:"col-md-3 col-sm-6",scopedSlots:e._u([{key:"icon",fn:function(){return[s("font-awesome-icon",{staticClass:"fa-5x faq-icon",attrs:{icon:"mobile"}})]},proxy:!0},{key:"headline",fn:function(){return[e._v("App herunterladen und los geht's!")]},proxy:!0},{key:"text",fn:function(){return[e._v("Holen Sie sich die App auf Ihr Handy und erstellen Sie Ihre ersten Angebote.")]},proxy:!0}],null,!1,962565223)})],1),s("divider",{staticClass:"row"}),s("Footer",{staticClass:"row"})],1):s("div",[s("RabattMenu")],1)])},n=[function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",{staticClass:"row justify-content-center align-content-center text-left",attrs:{id:"banner"}},[a("div",{staticClass:"col-md-5"},[a("h1",{staticClass:"heading"},[e._v("Erstellen Sie Ihre eigene Gutschein-App!")]),a("hr"),a("p",{staticClass:"heading-sub"},[e._v("Passen Sie mit FreePoint einfach und schnell Ihre eigene Gutschein-App an! Oder genießen Sie als Kunde alle Vorteile der Rabatte!")])]),a("div",{staticClass:"col-md-6"},[a("div",{staticClass:"carousel slide",attrs:{id:"carouselExampleIndicators","data-ride":"carousel","data-interval":"false"}},[a("div",{staticClass:"carousel-inner"},[a("div",{staticClass:"carousel-item active"},[a("div",{staticClass:"embed-responsive embed-responsive-16by9"},[a("iframe",{attrs:{width:"560",height:"315",src:"https://www.youtube.com/embed/JxS_LZZdyJ4",frameborder:"0",allow:"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture",allowfullscreen:""}})])]),a("div",{staticClass:"carousel-item"},[a("img",{attrs:{src:s("ba47"),alt:"Second slide"}})]),a("div",{staticClass:"carousel-item"},[a("img",{attrs:{src:s("7ec9"),alt:"Third slide"}})])]),a("a",{staticClass:"carousel-control-prev",attrs:{href:"#carouselExampleIndicators",role:"button","data-slide":"prev"}},[a("span",{staticClass:"carousel-control-prev-icon",attrs:{"aria-hidden":"true"}}),a("span",{staticClass:"sr-only"},[e._v("Previous")])]),a("a",{staticClass:"carousel-control-next",attrs:{href:"#carouselExampleIndicators",role:"button","data-slide":"next"}},[a("span",{staticClass:"carousel-control-next-icon",attrs:{"aria-hidden":"true"}}),a("span",{staticClass:"sr-only"},[e._v("Next")])])])])])}],o=s("218b"),r=s("9acf"),i=s("9b34"),c=function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("svg",{attrs:{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 1000 100",preserveAspectRatio:"none"}},[s("path",{staticClass:"elementor-shape-fill",attrs:{d:"M761.9,40.6L643.1,24L333.9,93.8L0.1,1H0v99h1000V1"}})])},l=[],u={name:"divider"},d=u,p=(s("ce68"),s("2877")),m=Object(p["a"])(d,c,l,!1,null,"5a58d4ac",null),f=m.exports,h=s("fd2d"),v=function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("div",{staticClass:"mb-5"},[e._t("icon"),s("p",{attrs:{id:"faq-headline"}},[e._t("headline")],2),s("p",{attrs:{id:"faq-text"}},[e._t("text")],2)],2)},g=[],b={name:"FaqElement"},w=b,y=(s("0068"),Object(p["a"])(w,v,g,!1,null,"5be44c06",null)),C=y.exports,_=s("ecee"),x=s("c074"),k=s("526d"),S=s("9377");_["c"].add(x["f"],x["u"],x["l"],x["t"],x["C"]);var R={name:"Root",components:{RegisterInput:S["a"],FormRegisterCompany:k["a"],FaqElement:C,Footer:h["a"],Divider:f,FormRegisterUser:i["a"],FormLogin:r["a"],RabattMenu:o["default"]}},$=R,O=(s("055b"),Object(p["a"])($,a,n,!1,null,"6c5e5aee",null));t["default"]=O.exports},"7ec9":function(e,t,s){e.exports=s.p+"img/Kunden.c797b514.png"},"8f52":function(e,t,s){"use strict";var a=s("34c2"),n=s.n(a);n.a},9377:function(e,t,s){"use strict";var a=function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("div",{staticClass:"form-group"},[s("label",{staticClass:"font-weight-bold d-block text-left"},[e._v(e._s(e.label)+" "),s("div",{staticClass:"input-group mt-2"},[e.$slots.prepend?s("span",{staticClass:"input-group-prepend"},[s("span",{staticClass:"input-group-text"},[e._t("prepend")],2)]):e._e(),e._t("default",[s("input",{staticClass:"form-control border-danger",staticStyle:{"border-width":"3px"},attrs:{disabled:"",placeholder:"please fill in a <input>"}})])],2)]),s("small",{staticClass:"form-text text-muted text-left"},[e._v(e._s(e.description))])])},n=[],o={name:"RegisterInput",props:["description","label"]},r=o,i=(s("dfdd"),s("2877")),c=Object(i["a"])(r,a,n,!1,null,"3d7687b0",null);t["a"]=c.exports},"9acf":function(e,t,s){"use strict";var a=function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("form",[s("register-input",{attrs:{title:"Email"}},[s("font-awesome-icon",{attrs:{slot:"prepend",icon:"at"},slot:"prepend"}),s("input",{directives:[{name:"model",rawName:"v-model",value:e.email,expression:"email"}],staticClass:"form-control",attrs:{type:"email",id:"inputLoginEmail",placeholder:"E-Mail-Adresse",required:""},domProps:{value:e.email},on:{input:function(t){t.target.composing||(e.email=t.target.value)}}})],1),s("register-input",{attrs:{title:"Password"}},[s("font-awesome-icon",{attrs:{slot:"prepend",icon:"key"},slot:"prepend"}),s("input",{directives:[{name:"model",rawName:"v-model",value:e.password,expression:"password"}],staticClass:"form-control",attrs:{type:"password",placeholder:"Passwort"},domProps:{value:e.password},on:{input:function(t){t.target.composing||(e.password=t.target.value)}}})],1),s("div",{staticClass:"form-group form-check"},[s("label",[s("input",{directives:[{name:"model",rawName:"v-model",value:e.remember,expression:"remember"}],staticClass:"form-check-input",attrs:{type:"checkbox"},domProps:{checked:Array.isArray(e.remember)?e._i(e.remember,null)>-1:e.remember},on:{change:function(t){var s=e.remember,a=t.target,n=!!a.checked;if(Array.isArray(s)){var o=null,r=e._i(s,o);a.checked?r<0&&(e.remember=s.concat([o])):r>-1&&(e.remember=s.slice(0,r).concat(s.slice(r+1)))}else e.remember=n}}}),e._v(" Remember me ")])]),s("button",{staticClass:"btn btn-primary",attrs:{type:"button",disabled:!e.email&&!e.password},on:{click:function(t){return e.login()}}},[e._v("Anmelden")])],1)},n=[],o=s("9377"),r=s("ecee"),i=s("c074");r["c"].add(i["a"],i["s"]);var c={name:"FormLogin",components:{RegisterInput:o["a"]},props:{overwritePathRedirect:Boolean},data:function(){return{email:"",password:"",remember:!1}},methods:{login:function(){var e=this;this.email&&this.password?this.$http.post(this.$store.state.url+"/loginUser",{email:this.email,password:this.password}).then((function(t){console.debug("Saving user login"),e.remember?localStorage.setItem("user",JSON.stringify(t.data)):localStorage.removeItem("user"),e.$store.commit("setUser",t.data),console.debug("User:",e.$store.state.user),console.debug("Saving Complete","Moving User to old Path"),e.overwritePathRedirect||(window.history.length>1?e.$router.go(-1):e.$router.push({path:"/"}))})).catch((function(t){console.debug("Config:",t),e.password=void 0})):console.log("Login information incomplete")}}},l=c,u=(s("fb3d"),s("2877")),d=Object(u["a"])(l,a,n,!1,null,"4055a516",null);t["a"]=d.exports},"9b34":function(e,t,s){"use strict";var a=function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("form",[s("register-input",[s("font-awesome-icon",{attrs:{slot:"prepend",icon:"user"},slot:"prepend"}),s("input",{directives:[{name:"model",rawName:"v-model",value:e.name,expression:"name"}],staticClass:"form-control",attrs:{type:"text",id:"inputRegisterUsername",placeholder:"Benutzername",autocomplete:"username",required:""},domProps:{value:e.name},on:{input:function(t){t.target.composing||(e.name=t.target.value)}}})],1),s("register-input",{attrs:{description:"Wir werden Ihre E-Mail-Adresse nicht weiterleiten."}},[s("font-awesome-icon",{attrs:{slot:"prepend",icon:"at"},slot:"prepend"}),s("input",{directives:[{name:"model",rawName:"v-model",value:e.email,expression:"email"}],staticClass:"form-control",attrs:{type:"email",id:"inputRegisterEmail",placeholder:"E-Mail-Adresse",required:""},domProps:{value:e.email},on:{input:function(t){t.target.composing||(e.email=t.target.value)}}})],1),s("register-input",[s("font-awesome-icon",{attrs:{slot:"prepend",icon:"key"},slot:"prepend"}),s("input",{directives:[{name:"model",rawName:"v-model",value:e.password,expression:"password"}],staticClass:"form-control",attrs:{type:"password",id:"inputRegisterPassword",placeholder:"Passwort",autocomplete:"new-password",required:""},domProps:{value:e.password},on:{input:function(t){t.target.composing||(e.password=t.target.value)}}})],1),s("register-input",[s("font-awesome-icon",{attrs:{slot:"prepend",icon:"key"},slot:"prepend"}),s("input",{directives:[{name:"model",rawName:"v-model",value:e.passwordConfirm,expression:"passwordConfirm"}],staticClass:"form-control",attrs:{type:"password",id:"inputRegisterPasswordConfirm",placeholder:"Passwort bestätigen",autocomplete:"new-password",required:""},domProps:{value:e.passwordConfirm},on:{input:function(t){t.target.composing||(e.passwordConfirm=t.target.value)}}})],1),s("div",{staticClass:"form-group form-check"},[s("input",{directives:[{name:"model",rawName:"v-model",value:e.TOS,expression:"TOS"}],staticClass:"form-check-input",attrs:{type:"checkbox",id:"inputRegisterTOS",required:""},domProps:{checked:Array.isArray(e.TOS)?e._i(e.TOS,null)>-1:e.TOS},on:{change:function(t){var s=e.TOS,a=t.target,n=!!a.checked;if(Array.isArray(s)){var o=null,r=e._i(s,o);a.checked?r<0&&(e.TOS=s.concat([o])):r>-1&&(e.TOS=s.slice(0,r).concat(s.slice(r+1)))}else e.TOS=n}}}),s("label",{attrs:{for:"inputRegisterTOS"}},[e._v(" Durch Ankreuzen dieser Option akzeptieren Sie unsere "),s("router-link",{attrs:{to:"/terms-and-service"}},[e._v("Nutzungsbedingungen.")])],1)]),s("button",{staticClass:"btn btn-primary",attrs:{type:"button",disabled:!e.TOS&&!e.email&&!e.password&&!e.passwordConfirm},on:{click:function(t){return e.register()}}},[e._v("Registrieren ")])],1)},n=[],o=(s("b0c0"),s("9377")),r=s("ecee"),i=s("c074");r["c"].add(i["a"],i["s"],i["I"]);var c={name:"FormRegisterUser",components:{RegisterInput:o["a"]},props:{overwritePathRedirect:Boolean},data:function(){return{email:"",password:"",passwordConfirm:"",name:"",TOS:!1}},methods:{register:function(){var e=this;this.email&&this.password&&this.passwordConfirm&&this.TOS?this.password===this.passwordConfirm?(this.$store.commit("setLoading",!0),this.$http.post(this.$store.state.url+"/registerUser",{email:this.email,password:this.password,username:this.name}).then((function(t){console.debug("Response:",t.data),console.debug("Saving user login"),localStorage.removeItem("user"),e.$store.commit("setUser",t.data),console.debug("Token:",e.$store.state.user),e.$store.commit("setLoading",!1),e.overwritePathRedirect||(window.history.length>1?e.$router.go(-1):e.$router.push({path:"/"}))})).catch((function(e){e.response?(console.debug("Data:",e.response.data),console.debug("Status:",e.response.status),console.debug("Headers:",e.response.headers)):e.request?console.debug("Request:",e.request):console.debug("Error:",e.message),console.debug("Config:",e.config)}))):console.log("The repeated password must be equal"):console.log("Form incomplete",[this.email,this.password,this.passwordConfirm,this.TOS])}}},l=c,u=(s("8f52"),s("2877")),d=Object(u["a"])(l,a,n,!1,null,"038c56ea",null);t["a"]=d.exports},b0c0:function(e,t,s){var a=s("83ab"),n=s("9bf2").f,o=Function.prototype,r=o.toString,i=/^\s*function ([^ (]*)/,c="name";a&&!(c in o)&&n(o,c,{configurable:!0,get:function(){try{return r.call(this).match(i)[1]}catch(e){return""}}})},ba47:function(e,t,s){e.exports=s.p+"img/Geschafte.611088b2.png"},c203:function(e,t,s){},ce68:function(e,t,s){"use strict";var a=s("2081"),n=s.n(a);n.a},dfdd:function(e,t,s){"use strict";var a=s("2622"),n=s.n(a);n.a},e03d:function(e,t,s){"use strict";var a=s("2537"),n=s.n(a);n.a},fb3d:function(e,t,s){"use strict";var a=s("5a71"),n=s.n(a);n.a},fbe2:function(e,t,s){"use strict";var a=s("c203"),n=s.n(a);n.a},fd2d:function(e,t,s){"use strict";var a=function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("footer",{staticClass:"d-flex justify-content-around py-3"},[s("div",[e._v("Ein Projekt der HTL Rennweg.")]),s("div",[e._v("Copyright © 2021 Freepoint | Powered by Freepoint")]),s("div",[s("router-link",{staticClass:"router-link",attrs:{to:"/imprint"}},[e._v(" Impressum ")]),e._v(" | "),s("router-link",{staticClass:"router-link",attrs:{to:"/privacy-policy"}},[e._v(" Datenschutzerklärung ")])],1)])},n=[],o={name:"Footer"},r=o,i=(s("fbe2"),s("2877")),c=Object(i["a"])(r,a,n,!1,null,"eec603ae",null);t["a"]=c.exports}}]);
//# sourceMappingURL=chunk-45d3639a.6542d830.js.map