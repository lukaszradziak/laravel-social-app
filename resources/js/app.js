require("./bootstrap");

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

import * as timeago from "timeago.js";

timeago.render(document.querySelectorAll("time"), "en_EN", {
    minInterval: 5,
});
