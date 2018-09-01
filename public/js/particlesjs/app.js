/* -----------------------------------------------
/* How to use? : Check the GitHub README
/* ----------------------------------------------- */

/* To load a config file (particles.json) you need to host this demo (MAMP/WAMP/local)... */
/*
particlesJS.load('particles-js', 'particles.json', function() {
  console.log('particles.js loaded - callback');
});
*/

/* Otherwise just put the config content (json): */

particlesJS('particles-js',

{
  "particles":{
    "number":{
      "value":200
    },
    "color":{
      "value":"#fff"
    },
    "shape":{
      "type":"circle",
      "stroke":{
        "width":1,
        "color":"#ccc"
      },
      "image":{
        "src":"http://www.iconsdb.com/icons/preview/white/contacts-xxl.png"
      }
    },
    "opacity":{
      "value":0.5,
      "random":true,
      "anim":{
        "enable":false,
        "speed":1
      }
    },
    "size":{
      "value": 3,
      "random":false,
      "anim":{
        "enable": false,
        "speed":30
      }
    },
    "line_linked":{
      "enable": true,
      "distance": 120,
      "color":"#fff",
      "width":1
    },
    "move":{
      "enable":true,
      "speed":5,
      "direction":"none",
      "straight":false
    }
  },
  "interactivity":{
    "events":{
      "onhover":{
        "enable":true,
        "mode":"grab"
      },
      "onclick":{
        "enable": true,
        "mode":"push"
      }
    },
    "modes":{
      "repulse":{
        "distance":50,
        "duration":0.8
      },
      "bubble":{
        "distance":100,
        "size":10
      }
    }
  }
}


);
