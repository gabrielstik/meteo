(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
'use strict';

require('./vendor/modernizr.js');

var _Weather = require('./components/Weather');

var _Weather2 = _interopRequireDefault(_Weather);

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { default: obj }; }

var weather = new _Weather2.default();
weather.rotateWindArrows();

},{"./components/Weather":2,"./vendor/modernizr.js":3}],2:[function(require,module,exports){
'use strict';

Object.defineProperty(exports, "__esModule", {
  value: true
});

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var Weather = function () {
  function Weather() {
    _classCallCheck(this, Weather);
  }

  _createClass(Weather, [{
    key: 'rotateWindArrows',
    value: function rotateWindArrows() {
      var $windArrows = document.querySelectorAll('.wind-arrow');
      var _iteratorNormalCompletion = true;
      var _didIteratorError = false;
      var _iteratorError = undefined;

      try {
        for (var _iterator = $windArrows[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
          var $windArrow = _step.value;

          var orientation = $windArrow.dataset.orientation;
          var speed = $windArrow.dataset.speed;
          $windArrow.style.transform = 'rotate(' + (orientation - 225) + 'deg)';
          var hue = 130 - speed * 2.5;
          if (hue < 0) hue = 0;
          $windArrow.style.color = 'hsl(' + hue + ',50%,50%)';
        }
      } catch (err) {
        _didIteratorError = true;
        _iteratorError = err;
      } finally {
        try {
          if (!_iteratorNormalCompletion && _iterator.return) {
            _iterator.return();
          }
        } finally {
          if (_didIteratorError) {
            throw _iteratorError;
          }
        }
      }
    }
  }]);

  return Weather;
}();

exports.default = Weather;

},{}],3:[function(require,module,exports){
"use strict";

var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) { return typeof obj; } : function (obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; };

/*! modernizr 3.5.0 (Custom Build) | MIT *
 * https://modernizr.com/download/?-touchevents-setclasses !*/
!function (e, n, t) {
  function o(e, n) {
    return (typeof e === "undefined" ? "undefined" : _typeof(e)) === n;
  }function s() {
    var e, n, t, s, a, i, r;for (var l in c) {
      if (c.hasOwnProperty(l)) {
        if (e = [], n = c[l], n.name && (e.push(n.name.toLowerCase()), n.options && n.options.aliases && n.options.aliases.length)) for (t = 0; t < n.options.aliases.length; t++) {
          e.push(n.options.aliases[t].toLowerCase());
        }for (s = o(n.fn, "function") ? n.fn() : n.fn, a = 0; a < e.length; a++) {
          i = e[a], r = i.split("."), 1 === r.length ? Modernizr[r[0]] = s : (!Modernizr[r[0]] || Modernizr[r[0]] instanceof Boolean || (Modernizr[r[0]] = new Boolean(Modernizr[r[0]])), Modernizr[r[0]][r[1]] = s), f.push((s ? "" : "no-") + r.join("-"));
        }
      }
    }
  }function a(e) {
    var n = u.className,
        t = Modernizr._config.classPrefix || "";if (p && (n = n.baseVal), Modernizr._config.enableJSClass) {
      var o = new RegExp("(^|\\s)" + t + "no-js(\\s|$)");n = n.replace(o, "$1" + t + "js$2");
    }Modernizr._config.enableClasses && (n += " " + t + e.join(" " + t), p ? u.className.baseVal = n : u.className = n);
  }function i() {
    return "function" != typeof n.createElement ? n.createElement(arguments[0]) : p ? n.createElementNS.call(n, "http://www.w3.org/2000/svg", arguments[0]) : n.createElement.apply(n, arguments);
  }function r() {
    var e = n.body;return e || (e = i(p ? "svg" : "body"), e.fake = !0), e;
  }function l(e, t, o, s) {
    var a,
        l,
        f,
        c,
        d = "modernizr",
        p = i("div"),
        h = r();if (parseInt(o, 10)) for (; o--;) {
      f = i("div"), f.id = s ? s[o] : d + (o + 1), p.appendChild(f);
    }return a = i("style"), a.type = "text/css", a.id = "s" + d, (h.fake ? h : p).appendChild(a), h.appendChild(p), a.styleSheet ? a.styleSheet.cssText = e : a.appendChild(n.createTextNode(e)), p.id = d, h.fake && (h.style.background = "", h.style.overflow = "hidden", c = u.style.overflow, u.style.overflow = "hidden", u.appendChild(h)), l = t(p, e), h.fake ? (h.parentNode.removeChild(h), u.style.overflow = c, u.offsetHeight) : p.parentNode.removeChild(p), !!l;
  }var f = [],
      c = [],
      d = { _version: "3.5.0", _config: { classPrefix: "", enableClasses: !0, enableJSClass: !0, usePrefixes: !0 }, _q: [], on: function on(e, n) {
      var t = this;setTimeout(function () {
        n(t[e]);
      }, 0);
    }, addTest: function addTest(e, n, t) {
      c.push({ name: e, fn: n, options: t });
    }, addAsyncTest: function addAsyncTest(e) {
      c.push({ name: null, fn: e });
    } },
      Modernizr = function Modernizr() {};Modernizr.prototype = d, Modernizr = new Modernizr();var u = n.documentElement,
      p = "svg" === u.nodeName.toLowerCase(),
      h = d._config.usePrefixes ? " -webkit- -moz- -o- -ms- ".split(" ") : ["", ""];d._prefixes = h;var m = d.testStyles = l;Modernizr.addTest("touchevents", function () {
    var t;if ("ontouchstart" in e || e.DocumentTouch && n instanceof DocumentTouch) t = !0;else {
      var o = ["@media (", h.join("touch-enabled),("), "heartz", ")", "{#modernizr{top:9px;position:absolute}}"].join("");m(o, function (e) {
        t = 9 === e.offsetTop;
      });
    }return t;
  }), s(), a(f), delete d.addTest, delete d.addAsyncTest;for (var v = 0; v < Modernizr._q.length; v++) {
    Modernizr._q[v]();
  }e.Modernizr = Modernizr;
}(window, document);

},{}]},{},[1])
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIm5vZGVfbW9kdWxlcy9icm93c2VyLXBhY2svX3ByZWx1ZGUuanMiLCJzcmMvc2NyaXB0cy9hcHAuanMiLCJzcmMvc2NyaXB0cy9jb21wb25lbnRzL1dlYXRoZXIuanMiLCJzcmMvc2NyaXB0cy92ZW5kb3IvbW9kZXJuaXpyLmpzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBOzs7QUNBQTs7QUFFQTs7Ozs7O0FBQ0EsSUFBTSxVQUFVLHVCQUFoQjtBQUNBLFFBQVEsZ0JBQVI7Ozs7Ozs7Ozs7Ozs7SUNKcUIsTzs7Ozs7Ozt1Q0FDQTtBQUNqQixVQUFNLGNBQWMsU0FBUyxnQkFBVCxDQUEwQixhQUExQixDQUFwQjtBQURpQjtBQUFBO0FBQUE7O0FBQUE7QUFFakIsNkJBQXlCLFdBQXpCLDhIQUFzQztBQUFBLGNBQTNCLFVBQTJCOztBQUNwQyxjQUFNLGNBQWMsV0FBVyxPQUFYLENBQW1CLFdBQXZDO0FBQ0EsY0FBTSxRQUFRLFdBQVcsT0FBWCxDQUFtQixLQUFqQztBQUNBLHFCQUFXLEtBQVgsQ0FBaUIsU0FBakIsZ0JBQXVDLGNBQWMsR0FBckQ7QUFDQSxjQUFNLE1BQU0sTUFBTSxRQUFRLEdBQTFCO0FBQ0EsY0FBSSxNQUFNLENBQVYsRUFBYSxNQUFNLENBQU47QUFDYixxQkFBVyxLQUFYLENBQWlCLEtBQWpCLFlBQWdDLEdBQWhDO0FBQ0Q7QUFUZ0I7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQVVsQjs7Ozs7O2tCQVhrQixPOzs7Ozs7O0FDQXJCOztBQUVDLENBQUMsVUFBUyxDQUFULEVBQVcsQ0FBWCxFQUFhLENBQWIsRUFBZTtBQUFDLFdBQVMsQ0FBVCxDQUFXLENBQVgsRUFBYSxDQUFiLEVBQWU7QUFBQyxXQUFPLFFBQU8sQ0FBUCx5Q0FBTyxDQUFQLE9BQVcsQ0FBbEI7QUFBb0IsWUFBUyxDQUFULEdBQVk7QUFBQyxRQUFJLENBQUosRUFBTSxDQUFOLEVBQVEsQ0FB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Q29udGVudCI6WyIoZnVuY3Rpb24gZSh0LG4scil7ZnVuY3Rpb24gcyhvLHUpe2lmKCFuW29dKXtpZighdFtvXSl7dmFyIGE9dHlwZW9mIHJlcXVpcmU9PVwiZnVuY3Rpb25cIiYmcmVxdWlyZTtpZighdSYmYSlyZXR1cm4gYShvLCEwKTtpZihpKXJldHVybiBpKG8sITApO3ZhciBmPW5ldyBFcnJvcihcIkNhbm5vdCBmaW5kIG1vZHVsZSAnXCIrbytcIidcIik7dGhyb3cgZi5jb2RlPVwiTU9EVUxFX05PVF9GT1VORFwiLGZ9dmFyIGw9bltvXT17ZXhwb3J0czp7fX07dFtvXVswXS5jYWxsKGwuZXhwb3J0cyxmdW5jdGlvbihlKXt2YXIgbj10W29dWzFdW2VdO3JldHVybiBzKG4/bjplKX0sbCxsLmV4cG9ydHMsZSx0LG4scil9cmV0dXJuIG5bb10uZXhwb3J0c312YXIgaT10eXBlb2YgcmVxdWlyZT09XCJmdW5jdGlvblwiJiZyZXF1aXJlO2Zvcih2YXIgbz0wO288ci5sZW5ndGg7bysrKXMocltvXSk7cmV0dXJuIHN9KSIsImltcG9ydCAnLi92ZW5kb3IvbW9kZXJuaXpyLmpzJ1xuXG5pbXBvcnQgV2VhdGhlciBmcm9tICcuL2NvbXBvbmVudHMvV2VhdGhlcidcbmNvbnN0IHdlYXRoZXIgPSBuZXcgV2VhdGhlcigpXG53ZWF0aGVyLnJvdGF0ZVdpbmRBcnJvd3MoKSIsImV4cG9ydCBkZWZhdWx0IGNsYXNzIFdlYXRoZXIge1xuICByb3RhdGVXaW5kQXJyb3dzKCkge1xuICAgIGNvbnN0ICR3aW5kQXJyb3dzID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbCgnLndpbmQtYXJyb3cnKVxuICAgIGZvciAoY29uc3QgJHdpbmRBcnJvdyBvZiAkd2luZEFycm93cykge1xuICAgICAgY29uc3Qgb3JpZW50YXRpb24gPSAkd2luZEFycm93LmRhdGFzZXQub3JpZW50YXRpb25cbiAgICAgIGNvbnN0IHNwZWVkID0gJHdpbmRBcnJvdy5kYXRhc2V0LnNwZWVkXG4gICAgICAkd2luZEFycm93LnN0eWxlLnRyYW5zZm9ybSA9IGByb3RhdGUoJHtvcmllbnRhdGlvbiAtIDIyNX1kZWcpYFxuICAgICAgY29uc3QgaHVlID0gMTMwIC0gc3BlZWQgKiAyLjVcbiAgICAgIGlmIChodWUgPCAwKSBodWUgPSAwXG4gICAgICAkd2luZEFycm93LnN0eWxlLmNvbG9yID0gYGhzbCgke2h1ZX0sNTAlLDUwJSlgXG4gICAgfVxuICB9XG59IiwiLyohIG1vZGVybml6ciAzLjUuMCAoQ3VzdG9tIEJ1aWxkKSB8IE1JVCAqXG4gKiBodHRwczovL21vZGVybml6ci5jb20vZG93bmxvYWQvPy10b3VjaGV2ZW50cy1zZXRjbGFzc2VzICEqL1xuICFmdW5jdGlvbihlLG4sdCl7ZnVuY3Rpb24gbyhlLG4pe3JldHVybiB0eXBlb2YgZT09PW59ZnVuY3Rpb24gcygpe3ZhciBlLG4sdCxzLGEsaSxyO2Zvcih2YXIgbCBpbiBjKWlmKGMuaGFzT3duUHJvcGVydHkobCkpe2lmKGU9W10sbj1jW2xdLG4ubmFtZSYmKGUucHVzaChuLm5hbWUudG9Mb3dlckNhc2UoKSksbi5vcHRpb25zJiZuLm9wdGlvbnMuYWxpYXNlcyYmbi5vcHRpb25zLmFsaWFzZXMubGVuZ3RoKSlmb3IodD0wO3Q8bi5vcHRpb25zLmFsaWFzZXMubGVuZ3RoO3QrKyllLnB1c2gobi5vcHRpb25zLmFsaWFzZXNbdF0udG9Mb3dlckNhc2UoKSk7Zm9yKHM9byhuLmZuLFwiZnVuY3Rpb25cIik/bi5mbigpOm4uZm4sYT0wO2E8ZS5sZW5ndGg7YSsrKWk9ZVthXSxyPWkuc3BsaXQoXCIuXCIpLDE9PT1yLmxlbmd0aD9Nb2Rlcm5penJbclswXV09czooIU1vZGVybml6cltyWzBdXXx8TW9kZXJuaXpyW3JbMF1daW5zdGFuY2VvZiBCb29sZWFufHwoTW9kZXJuaXpyW3JbMF1dPW5ldyBCb29sZWFuKE1vZGVybml6cltyWzBdXSkpLE1vZGVybml6cltyWzBdXVtyWzFdXT1zKSxmLnB1c2goKHM/XCJcIjpcIm5vLVwiKStyLmpvaW4oXCItXCIpKX19ZnVuY3Rpb24gYShlKXt2YXIgbj11LmNsYXNzTmFtZSx0PU1vZGVybml6ci5fY29uZmlnLmNsYXNzUHJlZml4fHxcIlwiO2lmKHAmJihuPW4uYmFzZVZhbCksTW9kZXJuaXpyLl9jb25maWcuZW5hYmxlSlNDbGFzcyl7dmFyIG89bmV3IFJlZ0V4cChcIihefFxcXFxzKVwiK3QrXCJuby1qcyhcXFxcc3wkKVwiKTtuPW4ucmVwbGFjZShvLFwiJDFcIit0K1wianMkMlwiKX1Nb2Rlcm5penIuX2NvbmZpZy5lbmFibGVDbGFzc2VzJiYobis9XCIgXCIrdCtlLmpvaW4oXCIgXCIrdCkscD91LmNsYXNzTmFtZS5iYXNlVmFsPW46dS5jbGFzc05hbWU9bil9ZnVuY3Rpb24gaSgpe3JldHVyblwiZnVuY3Rpb25cIiE9dHlwZW9mIG4uY3JlYXRlRWxlbWVudD9uLmNyZWF0ZUVsZW1lbnQoYXJndW1lbnRzWzBdKTpwP24uY3JlYXRlRWxlbWVudE5TLmNhbGwobixcImh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnXCIsYXJndW1lbnRzWzBdKTpuLmNyZWF0ZUVsZW1lbnQuYXBwbHkobixhcmd1bWVudHMpfWZ1bmN0aW9uIHIoKXt2YXIgZT1uLmJvZHk7cmV0dXJuIGV8fChlPWkocD9cInN2Z1wiOlwiYm9keVwiKSxlLmZha2U9ITApLGV9ZnVuY3Rpb24gbChlLHQsbyxzKXt2YXIgYSxsLGYsYyxkPVwibW9kZXJuaXpyXCIscD1pKFwiZGl2XCIpLGg9cigpO2lmKHBhcnNlSW50KG8sMTApKWZvcig7by0tOylmPWkoXCJkaXZcIiksZi5pZD1zP3Nbb106ZCsobysxKSxwLmFwcGVuZENoaWxkKGYpO3JldHVybiBhPWkoXCJzdHlsZVwiKSxhLnR5cGU9XCJ0ZXh0L2Nzc1wiLGEuaWQ9XCJzXCIrZCwoaC5mYWtlP2g6cCkuYXBwZW5kQ2hpbGQoYSksaC5hcHBlbmRDaGlsZChwKSxhLnN0eWxlU2hlZXQ/YS5zdHlsZVNoZWV0LmNzc1RleHQ9ZTphLmFwcGVuZENoaWxkKG4uY3JlYXRlVGV4dE5vZGUoZSkpLHAuaWQ9ZCxoLmZha2UmJihoLnN0eWxlLmJhY2tncm91bmQ9XCJcIixoLnN0eWxlLm92ZXJmbG93PVwiaGlkZGVuXCIsYz11LnN0eWxlLm92ZXJmbG93LHUuc3R5bGUub3ZlcmZsb3c9XCJoaWRkZW5cIix1LmFwcGVuZENoaWxkKGgpKSxsPXQocCxlKSxoLmZha2U/KGgucGFyZW50Tm9kZS5yZW1vdmVDaGlsZChoKSx1LnN0eWxlLm92ZXJmbG93PWMsdS5vZmZzZXRIZWlnaHQpOnAucGFyZW50Tm9kZS5yZW1vdmVDaGlsZChwKSwhIWx9dmFyIGY9W10sYz1bXSxkPXtfdmVyc2lvbjpcIjMuNS4wXCIsX2NvbmZpZzp7Y2xhc3NQcmVmaXg6XCJcIixlbmFibGVDbGFzc2VzOiEwLGVuYWJsZUpTQ2xhc3M6ITAsdXNlUHJlZml4ZXM6ITB9LF9xOltdLG9uOmZ1bmN0aW9uKGUsbil7dmFyIHQ9dGhpcztzZXRUaW1lb3V0KGZ1bmN0aW9uKCl7bih0W2VdKX0sMCl9LGFkZFRlc3Q6ZnVuY3Rpb24oZSxuLHQpe2MucHVzaCh7bmFtZTplLGZuOm4sb3B0aW9uczp0fSl9LGFkZEFzeW5jVGVzdDpmdW5jdGlvbihlKXtjLnB1c2goe25hbWU6bnVsbCxmbjplfSl9fSxNb2Rlcm5penI9ZnVuY3Rpb24oKXt9O01vZGVybml6ci5wcm90b3R5cGU9ZCxNb2Rlcm5penI9bmV3IE1vZGVybml6cjt2YXIgdT1uLmRvY3VtZW50RWxlbWVudCxwPVwic3ZnXCI9PT11Lm5vZGVOYW1lLnRvTG93ZXJDYXNlKCksaD1kLl9jb25maWcudXNlUHJlZml4ZXM/XCIgLXdlYmtpdC0gLW1vei0gLW8tIC1tcy0gXCIuc3BsaXQoXCIgXCIpOltcIlwiLFwiXCJdO2QuX3ByZWZpeGVzPWg7dmFyIG09ZC50ZXN0U3R5bGVzPWw7TW9kZXJuaXpyLmFkZFRlc3QoXCJ0b3VjaGV2ZW50c1wiLGZ1bmN0aW9uKCl7dmFyIHQ7aWYoXCJvbnRvdWNoc3RhcnRcImluIGV8fGUuRG9jdW1lbnRUb3VjaCYmbiBpbnN0YW5jZW9mIERvY3VtZW50VG91Y2gpdD0hMDtlbHNle3ZhciBvPVtcIkBtZWRpYSAoXCIsaC5qb2luKFwidG91Y2gtZW5hYmxlZCksKFwiKSxcImhlYXJ0elwiLFwiKVwiLFwieyNtb2Rlcm5penJ7dG9wOjlweDtwb3NpdGlvbjphYnNvbHV0ZX19XCJdLmpvaW4oXCJcIik7bShvLGZ1bmN0aW9uKGUpe3Q9OT09PWUub2Zmc2V0VG9wfSl9cmV0dXJuIHR9KSxzKCksYShmKSxkZWxldGUgZC5hZGRUZXN0LGRlbGV0ZSBkLmFkZEFzeW5jVGVzdDtmb3IodmFyIHY9MDt2PE1vZGVybml6ci5fcS5sZW5ndGg7disrKU1vZGVybml6ci5fcVt2XSgpO2UuTW9kZXJuaXpyPU1vZGVybml6cn0od2luZG93LGRvY3VtZW50KTsiXX0=
