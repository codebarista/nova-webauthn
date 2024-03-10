(()=>{"use strict";var e,t={223:(e,t,r)=>{const n=Vue;var o={class:"p-4"},a={class:"mb-4"},i={id:"register-form"},s={class:"flex items-center gap-1"};const c={props:["resourceName","resourceId","panel"],setup:function(){if("undefined"==typeof WebAuthn){var e=new URL("vendor/webauthn/webauthn.js",location.origin),t=document.createElement("script");t.setAttribute("src",e),document.head.appendChild(t)}},methods:{isCurrentUser:function(){return~~this.resourceId==~~this.$store.state.currentUser.id},register:function(e){e.preventDefault(),(new WebAuthn).register().then((function(e){return alert("Registration successful.")})).catch((function(e){return alert("Something went wrong.")}))}}};const u=(0,r(262).A)(c,[["render",function(e,t,r,c,u,l){var d=(0,n.resolveComponent)("heading"),p=(0,n.resolveComponent)("Card"),f=(0,n.resolveComponent)("LoadingView");return l.isCurrentUser()?((0,n.openBlock)(),(0,n.createBlock)(f,{key:0,loading:!1},{default:(0,n.withCtx)((function(){return[(0,n.createVNode)(d,{class:"mb-6"},{default:(0,n.withCtx)((function(){return[(0,n.createTextVNode)((0,n.toDisplayString)(e.__("Passkey Authentication")),1)]})),_:1}),(0,n.createVNode)(p,null,{default:(0,n.withCtx)((function(){return[(0,n.createElementVNode)("div",o,[(0,n.createElementVNode)("p",a,(0,n.toDisplayString)(e.__("Authenticate with fingerprints, patterns and biometric data.")),1),(0,n.createElementVNode)("form",i,[(0,n.createElementVNode)("button",{type:"submit",onClick:t[0]||(t[0]=function(){return l.register&&l.register.apply(l,arguments)}),class:"border text-left appearance-none cursor-pointer rounded text-sm font-bold focus:outline-none focus:ring ring-primary-200 dark:ring-gray-600 relative disabled:cursor-not-allowed inline-flex items-center justify-center shadow h-9 px-3 bg-primary-500 border-primary-500 hover:[&:not(:disabled)]:bg-primary-400 hover:[&:not(:disabled)]:border-primary-400 text-white dark:text-gray-900 w-48 flex justify-center"},[(0,n.createElementVNode)("span",s,[(0,n.createElementVNode)("span",null,(0,n.toDisplayString)(e.__("Register Passkey")),1)])])])])]})),_:1})]})),_:1})):(0,n.createCommentVNode)("",!0)}]]);Nova.booting((function(e,t){e.component("nova-webauthn",u)}))},351:()=>{},262:(e,t)=>{t.A=(e,t)=>{const r=e.__vccOpts||e;for(const[e,n]of t)r[e]=n;return r}}},r={};function n(e){var o=r[e];if(void 0!==o)return o.exports;var a=r[e]={exports:{}};return t[e](a,a.exports,n),a.exports}n.m=t,e=[],n.O=(t,r,o,a)=>{if(!r){var i=1/0;for(l=0;l<e.length;l++){for(var[r,o,a]=e[l],s=!0,c=0;c<r.length;c++)(!1&a||i>=a)&&Object.keys(n.O).every((e=>n.O[e](r[c])))?r.splice(c--,1):(s=!1,a<i&&(i=a));if(s){e.splice(l--,1);var u=o();void 0!==u&&(t=u)}}return t}a=a||0;for(var l=e.length;l>0&&e[l-1][2]>a;l--)e[l]=e[l-1];e[l]=[r,o,a]},n.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),(()=>{var e={416:0,757:0};n.O.j=t=>0===e[t];var t=(t,r)=>{var o,a,[i,s,c]=r,u=0;if(i.some((t=>0!==e[t]))){for(o in s)n.o(s,o)&&(n.m[o]=s[o]);if(c)var l=c(n)}for(t&&t(r);u<i.length;u++)a=i[u],n.o(e,a)&&e[a]&&e[a][0](),e[a]=0;return n.O(l)},r=self.webpackChunkcodebarista_nova_webauthn=self.webpackChunkcodebarista_nova_webauthn||[];r.forEach(t.bind(null,0)),r.push=t.bind(null,r.push.bind(r))})(),n.O(void 0,[757],(()=>n(223)));var o=n.O(void 0,[757],(()=>n(351)));o=n.O(o)})();