/**
 * This will track all the images and fonts for publishing.
 */
import.meta.glob(["../images/**", "../fonts/**"]);

/**
 * Main vue bundler.
 */
import { createApp } from "vue/dist/vue.esm-bundler";

/**
 * We are defining all the global rules here and configuring
 * all the `vee-validate` settings.
 */
import { configure, defineRule } from "vee-validate";

/**
 * Registration of all global validators.
 */
// Object.keys(AllRules).forEach(rule => {
//     defineRule(rule, AllRules[rule]);
// });

import Axios from "./plugins/axios";
import CreateElement from "./plugins/createElement";
import Emitter from "./plugins/emitter";
import Admin from "./plugins/admin";





// window.addEventListener("load", function (event) {
//     app.mount("#app");
// });
