(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-2d0be70b"],{"2fef":function(e,t,s){"use strict";s.r(t);var r=function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("div",{staticClass:"container",attrs:{id:"login"}},[s("form-login"),s("p",{staticClass:"col"},[s("router-link",{attrs:{to:"/resetPassword"}},[e._v("Forgot Password")])],1),s("p",{staticClass:"col"},[e._v(" Not yet a member? "),s("router-link",{attrs:{to:"/register"}},[e._v("Register")]),e._v(" here ")],1)],1)},o=[],a=function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("form",[s("div",{staticClass:"form-group input-group"},[e._m(0),s("input",{directives:[{name:"model",rawName:"v-model",value:e.email,expression:"email"}],staticClass:"form-control",attrs:{type:"email",id:"inputLoginEmail",placeholder:"E-Mail",required:""},domProps:{value:e.email},on:{input:function(t){t.target.composing||(e.email=t.target.value)}}})]),s("div",{staticClass:"form-group input-group"},[e._m(1),s("input",{directives:[{name:"model",rawName:"v-model",value:e.password,expression:"password"}],staticClass:"form-control",attrs:{type:"password",id:"inputLoginPassword",placeholder:"Password"},domProps:{value:e.password},on:{input:function(t){t.target.composing||(e.password=t.target.value)}}})]),s("div",{staticClass:"form-group form-check"},[s("input",{directives:[{name:"model",rawName:"v-model",value:e.remember,expression:"remember"}],staticClass:"form-check-input",attrs:{type:"checkbox",id:"inputLoginRemember"},domProps:{checked:Array.isArray(e.remember)?e._i(e.remember,null)>-1:e.remember},on:{change:function(t){var s=e.remember,r=t.target,o=!!r.checked;if(Array.isArray(s)){var a=null,n=e._i(s,a);r.checked?n<0&&(e.remember=s.concat([a])):n>-1&&(e.remember=s.slice(0,n).concat(s.slice(n+1)))}else e.remember=o}}}),s("label",{attrs:{for:"inputLoginRemember"}},[e._v("Remember me")])]),s("button",{staticClass:"btn btn-primary",attrs:{type:"submit"},on:{click:function(t){return e.login()}}},[e._v("Login")])])},n=[function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("div",{staticClass:"input-group-prepend"},[s("span",{staticClass:"input-group-text"},[s("i",{staticClass:"fas fa-user"})])])},function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("div",{staticClass:"input-group-prepend"},[s("span",{staticClass:"input-group-text"},[s("i",{staticClass:"fas fa-key"})])])}],i=s("bc3a"),l=s.n(i),c={name:"FormLogin",data:function(){return{email:"",password:"",remember:!1}},methods:{login:function(){var e=this;this.email&&this.password&&l.a.post(this.$store.state.url+"/loginUser",{email:this.email,password:this.password}).then((function(t){console.debug("Response:",t.data),console.debug("Saving user login"),e.remember?localStorage.setItem("user",JSON.stringify(t.data)):localStorage.setItem("user",JSON.stringify({})),sessionStorage.setItem("user",JSON.stringify(t.data)),e.$store.commit("setToken",JSON.parse(sessionStorage.getItem("user")).token),console.debug("Token:",e.$store.state.token),e.$router.push({path:"menu"})})).catch((function(e){e.response?(console.debug("Data:",e.response.data),console.debug("Status:",e.response.status),console.debug("Headers:",e.response.headers)):e.request?console.debug("Request:",e.request):console.debug("Error:",e.message),console.debug("Config:",e.config)}))}}},u=c,m=s("2877"),p=Object(m["a"])(u,a,n,!1,null,"c7bbda76",null),d=p.exports,g={name:"Login",components:{FormLogin:d}},b=g,f=Object(m["a"])(b,r,o,!1,null,"2487b884",null);t["default"]=f.exports}}]);
//# sourceMappingURL=chunk-2d0be70b.54aa98fc.js.map