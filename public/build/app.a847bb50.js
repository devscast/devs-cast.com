(window.webpackJsonp=window.webpackJsonp||[]).push([["app"],{NlKh:function(e,t,n){},ng4s:function(e,t,n){"use strict";n.r(t);n("NlKh"),n("B5w2"),n("pJ2T");var a=n("njen");window.addEventListener("scroll",(function(){var e=document.querySelector(".navbar"),t=e.classList.contains("is-sticky");window.scrollY>100?t||e.classList.add("is-sticky"):t&&e.classList.remove("is-sticky")})),document.addEventListener("DOMContentLoaded",(function(){if("undefined"!=typeof particlesJS)try{window.particlesJS("js-particles",a)}catch(e){console.log({e:e})}if("undefined"!=typeof GitHubCalendar)try{GitHubCalendar(".calendar","bernard-ng",{responsive:!0,global_stats:!1})}catch(e){console.error({e:e})}}));var r=n("EVdn"),i=n.n(r),o=(n("9Oqj"),i()(".progress-line"));o.length&&o.appear((function(){var e=i()(this),t=e.data("width");i()(e).css("width",t+"%")}),{accY:0});var s=i()(".count-box");s.length&&s.appear((function(){var e=i()(this),t=e.find(".count-text").attr("data-stop"),n=parseInt(e.find(".count-text").attr("data-speed"),10);e.hasClass("counted")||(e.addClass("counted"),i()({countNum:e.find(".count-text").text()}).animate({countNum:t},{duration:n,easing:"linear",step:function(){e.find(".count-text").text(Math.floor(this.countNum))},complete:function(){e.find(".count-text").text(this.countNum)}}))}),{accY:0});n("VV8U");function c(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(e);t&&(a=a.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,a)}return n}function l(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?c(Object(n),!0).forEach((function(t){u(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):c(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}function u(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}var d={loop:!0,nav:!0,dots:!1,autoplayHoverPause:!0,autoplay:!0,responsive:{0:{items:1},576:{items:2},768:{items:2},1024:{items:3},1200:{items:4}},navText:["<i class='flaticon-left-arrow'></i>","<i class='flaticon-right-arrow'></i>"]};i()(".team-slides").owlCarousel(l({},d,{autoplayHoverPause:!0,mouseDrag:!0,margin:30})),i()(".projects-image-slides").owlCarousel(l({},d,{autoplayHoverPause:!0,mouseDrag:!0,margin:30,responsive:{0:{items:1},768:{items:2},1200:{items:2}}}))},njen:function(e){e.exports=JSON.parse('{"particles":{"number":{"value":45,"density":{"enable":true,"value_area":900}},"color":{"value":"#15db95"},"shape":{"type":"circle","stroke":{"width":0,"color":"#000000"},"polygon":{"nb_sides":5},"image":{"src":"img/github.svg","width":100,"height":100}},"opacity":{"value":0.5,"random":true,"anim":{"enable":false,"speed":1,"opacity_min":0.1,"sync":false}},"size":{"value":3,"random":true,"anim":{"enable":false,"speed":40,"size_min":0.1,"sync":false}},"line_linked":{"enable":true,"distance":150,"color":"#ffffff","opacity":0.4,"width":1},"move":{"enable":true,"speed":6,"direction":"none","random":false,"straight":false,"out_mode":"out","bounce":false,"attract":{"enable":false,"rotateX":600,"rotateY":1200}}},"interactivity":{"detect_on":"canvas","events":{"onhover":{"enable":false,"mode":"repulse"},"onclick":{"enable":false,"mode":"push"},"resize":true},"modes":{"grab":{"distance":200,"line_linked":{"opacity":0.44523237082189915}},"bubble":{"distance":400,"size":40,"duration":2,"opacity":8,"speed":3},"repulse":{"distance":200,"duration":0.4},"push":{"particles_nb":4},"remove":{"particles_nb":2}}},"retina_detect":true}')}},[["ng4s","runtime",0,2]]]);