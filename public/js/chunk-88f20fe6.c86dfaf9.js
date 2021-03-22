(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-88f20fe6"],{"1e7f":function(e,t,s){"use strict";s.r(t);var r=function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("div",{staticClass:"container",attrs:{id:"register"}},[s("div",{staticClass:"row justify-content-center align-content-center"},[s("div",{staticClass:"shadow-lg p-3 mb-5 bg-white rounded",attrs:{id:"login-form"}},[s("h2",[e._v("Registrieren")]),s("form-register-user",{staticClass:"p-4"}),s("p",[e._v(" Sie haben bereits einen Account? Dann können Sie sich hier "),s("router-link",{attrs:{to:"/login"}},[e._v("anmelden.")])],1)],1)]),e.$store.state.loading?s("div",{staticClass:"row justify-content-center"},[s("Progressbar")],1):e._e()])},n=[],o=s("9b34"),a=function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("div",{staticClass:"progressbar"})},i=[],c={name:"progressbar"},l=c,u=(s("49ef"),s("2877")),p=Object(u["a"])(l,a,i,!1,null,"39c33f6b",null),d=p.exports,m={name:"RegisterUser",components:{Progressbar:d,FormRegisterUser:o["a"]}},f=m,g=(s("53ac"),Object(u["a"])(f,r,n,!1,null,"d297168a",null));t["default"]=g.exports},2622:function(e,t,s){},"34c2":function(e,t,s){},"49ef":function(e,t,s){"use strict";var r=s("feb2"),n=s.n(r);n.a},"53ac":function(e,t,s){"use strict";var r=s("6842"),n=s.n(r);n.a},6842:function(e,t,s){},"8f52":function(e,t,s){"use strict";var r=s("34c2"),n=s.n(r);n.a},9377:function(e,t,s){"use strict";var r=function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("div",{staticClass:"form-group"},[s("label",{staticClass:"font-weight-bold d-block text-left"},[e._v(e._s(e.label)+" "),s("div",{staticClass:"input-group mt-2"},[e.$slots.prepend?s("span",{staticClass:"input-group-prepend"},[s("span",{staticClass:"input-group-text"},[e._t("prepend")],2)]):e._e(),e._t("default",[s("input",{staticClass:"form-control border-danger",staticStyle:{"border-width":"3px"},attrs:{disabled:"",placeholder:"please fill in a <input>"}})])],2)]),s("small",{staticClass:"form-text text-muted text-left"},[e._v(e._s(e.description))])])},n=[],o={name:"RegisterInput",props:["description","label"]},a=o,i=(s("dfdd"),s("2877")),c=Object(i["a"])(a,r,n,!1,null,"3d7687b0",null);t["a"]=c.exports},"9b34":function(e,t,s){"use strict";var r=function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("form",[s("register-input",[s("font-awesome-icon",{attrs:{slot:"prepend",icon:"user"},slot:"prepend"}),s("input",{directives:[{name:"model",rawName:"v-model",value:e.name,expression:"name"}],staticClass:"form-control",attrs:{type:"text",id:"inputRegisterUsername",placeholder:"Benutzername",autocomplete:"username",required:""},domProps:{value:e.name},on:{input:function(t){t.target.composing||(e.name=t.target.value)}}})],1),s("register-input",{attrs:{description:"Wir werden Ihre E-Mail-Adresse nicht weiterleiten."}},[s("font-awesome-icon",{attrs:{slot:"prepend",icon:"at"},slot:"prepend"}),s("input",{directives:[{name:"model",rawName:"v-model",value:e.email,expression:"email"}],staticClass:"form-control",attrs:{type:"email",id:"inputRegisterEmail",placeholder:"E-Mail-Adresse",required:""},domProps:{value:e.email},on:{input:function(t){t.target.composing||(e.email=t.target.value)}}})],1),s("register-input",[s("font-awesome-icon",{attrs:{slot:"prepend",icon:"key"},slot:"prepend"}),s("input",{directives:[{name:"model",rawName:"v-model",value:e.password,expression:"password"}],staticClass:"form-control",attrs:{type:"password",id:"inputRegisterPassword",placeholder:"Passwort",autocomplete:"new-password",required:""},domProps:{value:e.password},on:{input:function(t){t.target.composing||(e.password=t.target.value)}}})],1),s("register-input",[s("font-awesome-icon",{attrs:{slot:"prepend",icon:"key"},slot:"prepend"}),s("input",{directives:[{name:"model",rawName:"v-model",value:e.passwordConfirm,expression:"passwordConfirm"}],staticClass:"form-control",attrs:{type:"password",id:"inputRegisterPasswordConfirm",placeholder:"Passwort bestätigen",autocomplete:"new-password",required:""},domProps:{value:e.passwordConfirm},on:{input:function(t){t.target.composing||(e.passwordConfirm=t.target.value)}}})],1),s("div",{staticClass:"form-group form-check"},[s("input",{directives:[{name:"model",rawName:"v-model",value:e.TOS,expression:"TOS"}],staticClass:"form-check-input",attrs:{type:"checkbox",id:"inputRegisterTOS",required:""},domProps:{checked:Array.isArray(e.TOS)?e._i(e.TOS,null)>-1:e.TOS},on:{change:function(t){var s=e.TOS,r=t.target,n=!!r.checked;if(Array.isArray(s)){var o=null,a=e._i(s,o);r.checked?a<0&&(e.TOS=s.concat([o])):a>-1&&(e.TOS=s.slice(0,a).concat(s.slice(a+1)))}else e.TOS=n}}}),s("label",{attrs:{for:"inputRegisterTOS"}},[e._v(" Durch Ankreuzen dieser Option akzeptieren Sie unsere "),s("router-link",{attrs:{to:"/terms-and-service"}},[e._v("Nutzungsbedingungen.")])],1)]),s("button",{staticClass:"btn btn-primary",attrs:{type:"button",disabled:!e.TOS&&!e.email&&!e.password&&!e.passwordConfirm},on:{click:function(t){return e.register()}}},[e._v("Registrieren ")])],1)},n=[],o=(s("b0c0"),s("9377")),a=s("ecee"),i=s("c074");a["c"].add(i["a"],i["r"],i["H"]);var c={name:"FormRegisterUser",components:{RegisterInput:o["a"]},props:{overwritePathRedirect:Boolean},data:function(){return{email:"",password:"",passwordConfirm:"",name:"",TOS:!1}},methods:{register:function(){var e=this;this.email&&this.password&&this.passwordConfirm&&this.TOS?this.password===this.passwordConfirm?(this.$store.commit("setLoading",!0),this.$http.post(this.$store.state.url+"/registerUser",{email:this.email,password:this.password,username:this.name}).then((function(t){console.debug("Response:",t.data),console.debug("Saving user login"),localStorage.removeItem("user"),e.$store.commit("setUser",t.data),console.debug("Token:",e.$store.state.user),e.$store.commit("setLoading",!1),e.overwritePathRedirect||(window.history.length>1?e.$router.go(-1):e.$router.push({path:"/"}))})).catch((function(e){e.response?(console.debug("Data:",e.response.data),console.debug("Status:",e.response.status),console.debug("Headers:",e.response.headers)):e.request?console.debug("Request:",e.request):console.debug("Error:",e.message),console.debug("Config:",e.config)}))):console.log("The repeated password must be equal"):console.log("Form incomplete",[this.email,this.password,this.passwordConfirm,this.TOS])}}},l=c,u=(s("8f52"),s("2877")),p=Object(u["a"])(l,r,n,!1,null,"038c56ea",null);t["a"]=p.exports},b0c0:function(e,t,s){var r=s("83ab"),n=s("9bf2").f,o=Function.prototype,a=o.toString,i=/^\s*function ([^ (]*)/,c="name";r&&!(c in o)&&n(o,c,{configurable:!0,get:function(){try{return a.call(this).match(i)[1]}catch(e){return""}}})},dfdd:function(e,t,s){"use strict";var r=s("2622"),n=s.n(r);n.a},feb2:function(e,t,s){}}]);
//# sourceMappingURL=chunk-88f20fe6.c86dfaf9.js.map