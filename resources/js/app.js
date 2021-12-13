require("./bootstrap");

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

import * as timeago from "timeago.js";
const timeNodes = document.querySelectorAll("time");
if (timeNodes.length) {
    timeago.render(timeNodes, "en_EN", {
        minInterval: 5,
    });
}
