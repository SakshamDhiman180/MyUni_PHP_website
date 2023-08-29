"use strict";

function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _nonIterableRest(); }

function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance"); }

function _iterableToArrayLimit(arr, i) { if (!(Symbol.iterator in Object(arr) || Object.prototype.toString.call(arr) === "[object Arguments]")) { return; } var _arr = []; var _n = true; var _d = false; var _e = undefined; try { for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"] != null) _i["return"](); } finally { if (_d) throw _e; } } return _arr; }

function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }

function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(source, true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(source).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance"); }

function _iterableToArray(iter) { if (Symbol.iterator in Object(iter) || Object.prototype.toString.call(iter) === "[object Arguments]") return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) { for (var i = 0, arr2 = new Array(arr.length); i < arr.length; i++) { arr2[i] = arr[i]; } return arr2; } }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

/**
 * Minified by jsDelivr using Terser v5.3.5.
 * Original file: /npm/simple-datatables@3.0.2/dist/umd/simple-datatables.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
!function (t) {
  if ("object" == (typeof exports === "undefined" ? "undefined" : _typeof(exports)) && "undefined" != typeof module) module.exports = t();else if ("function" == typeof define && define.amd) define([], t);else {
    ("undefined" != typeof window ? window : "undefined" != typeof global ? global : "undefined" != typeof self ? self : this).simpleDatatables = t();
  }
}(function () {
  return function t(e, s, i) {
    function a(r, h) {
      if (!s[r]) {
        if (!e[r]) {
          var o = "function" == typeof require && require;
          if (!h && o) return o(r, !0);
          if (n) return n(r, !0);
          var l = new Error("Cannot find module '" + r + "'");
          throw l.code = "MODULE_NOT_FOUND", l;
        }

        var d = s[r] = {
          exports: {}
        };
        e[r][0].call(d.exports, function (t) {
          return a(e[r][1][t] || t);
        }, d, d.exports, t, e, s, i);
      }

      return s[r].exports;
    }

    for (var n = "function" == typeof require && require, r = 0; r < i.length; r++) {
      a(i[r]);
    }

    return a;
  }({
    1: [function (t, e, s) {
      (function (t) {
        (function () {
          "use strict";

          function e(t, e) {
            return t(e = {
              exports: {}
            }, e.exports), e.exports;
          }

          "undefined" != typeof globalThis ? globalThis : "undefined" != typeof window ? window : void 0 !== t || "undefined" != typeof self && self;
          var i = e(function (t, e) {
            t.exports = function () {
              var t = "millisecond",
                  e = "second",
                  s = "minute",
                  i = "hour",
                  a = "day",
                  n = "week",
                  r = "month",
                  h = "quarter",
                  o = "year",
                  l = "date",
                  d = /^(\d{4})[-/]?(\d{1,2})?[-/]?(\d{0,2})[^0-9]*(\d{1,2})?:?(\d{1,2})?:?(\d{1,2})?[.:]?(\d+)?$/,
                  c = /\[([^\]]+)]|Y{1,4}|M{1,4}|D{1,2}|d{1,4}|H{1,2}|h{1,2}|a|A|m{1,2}|s{1,2}|Z{1,2}|SSS/g,
                  u = {
                name: "en",
                weekdays: "Sunday_Monday_Tuesday_Wednesday_Thursday_Friday_Saturday".split("_"),
                months: "January_February_March_April_May_June_July_August_September_October_November_December".split("_")
              },
                  p = function p(t, e, s) {
                var i = String(t);
                return !i || i.length >= e ? t : "" + Array(e + 1 - i.length).join(s) + t;
              },
                  f = {
                s: p,
                z: function z(t) {
                  var e = -t.utcOffset(),
                      s = Math.abs(e),
                      i = Math.floor(s / 60),
                      a = s % 60;
                  return (e <= 0 ? "+" : "-") + p(i, 2, "0") + ":" + p(a, 2, "0");
                },
                m: function t(e, s) {
                  if (e.date() < s.date()) return -t(s, e);
                  var i = 12 * (s.year() - e.year()) + (s.month() - e.month()),
                      a = e.clone().add(i, r),
                      n = s - a < 0,
                      h = e.clone().add(i + (n ? -1 : 1), r);
                  return +(-(i + (s - a) / (n ? a - h : h - a)) || 0);
                },
                a: function a(t) {
                  return t < 0 ? Math.ceil(t) || 0 : Math.floor(t);
                },
                p: function p(d) {
                  return {
                    M: r,
                    y: o,
                    w: n,
                    d: a,
                    D: l,
                    h: i,
                    m: s,
                    s: e,
                    ms: t,
                    Q: h
                  }[d] || String(d || "").toLowerCase().replace(/s$/, "");
                },
                u: function u(t) {
                  return void 0 === t;
                }
              },
                  g = "en",
                  m = {};

              m[g] = u;

              var b = function b(t) {
                return t instanceof C;
              },
                  y = function y(t, e, s) {
                var i;
                if (!t) return g;
                if ("string" == typeof t) m[t] && (i = t), e && (m[t] = e, i = t);else {
                  var a = t.name;
                  m[a] = t, i = a;
                }
                return !s && i && (g = i), i || !s && g;
              },
                  v = function v(t, e) {
                if (b(t)) return t.clone();
                var s = "object" == _typeof(e) ? e : {};
                return s.date = t, s.args = arguments, new C(s);
              },
                  w = f;

              w.l = y, w.i = b, w.w = function (t, e) {
                return v(t, {
                  locale: e.$L,
                  utc: e.$u,
                  x: e.$x,
                  $offset: e.$offset
                });
              };

              var C = function () {
                function u(t) {
                  this.$L = y(t.locale, null, !0), this.parse(t);
                }

                var p = u.prototype;
                return p.parse = function (t) {
                  this.$d = function (t) {
                    var e = t.date,
                        s = t.utc;
                    if (null === e) return new Date(NaN);
                    if (w.u(e)) return new Date();
                    if (e instanceof Date) return new Date(e);

                    if ("string" == typeof e && !/Z$/i.test(e)) {
                      var i = e.match(d);

                      if (i) {
                        var a = i[2] - 1 || 0,
                            n = (i[7] || "0").substring(0, 3);
                        return s ? new Date(Date.UTC(i[1], a, i[3] || 1, i[4] || 0, i[5] || 0, i[6] || 0, n)) : new Date(i[1], a, i[3] || 1, i[4] || 0, i[5] || 0, i[6] || 0, n);
                      }
                    }

                    return new Date(e);
                  }(t), this.$x = t.x || {}, this.init();
                }, p.init = function () {
                  var t = this.$d;
                  this.$y = t.getFullYear(), this.$M = t.getMonth(), this.$D = t.getDate(), this.$W = t.getDay(), this.$H = t.getHours(), this.$m = t.getMinutes(), this.$s = t.getSeconds(), this.$ms = t.getMilliseconds();
                }, p.$utils = function () {
                  return w;
                }, p.isValid = function () {
                  return !("Invalid Date" === this.$d.toString());
                }, p.isSame = function (t, e) {
                  var s = v(t);
                  return this.startOf(e) <= s && s <= this.endOf(e);
                }, p.isAfter = function (t, e) {
                  return v(t) < this.startOf(e);
                }, p.isBefore = function (t, e) {
                  return this.endOf(e) < v(t);
                }, p.$g = function (t, e, s) {
                  return w.u(t) ? this[e] : this.set(s, t);
                }, p.unix = function () {
                  return Math.floor(this.valueOf() / 1e3);
                }, p.valueOf = function () {
                  return this.$d.getTime();
                }, p.startOf = function (t, h) {
                  var d = this,
                      c = !!w.u(h) || h,
                      u = w.p(t),
                      p = function p(t, e) {
                    var s = w.w(d.$u ? Date.UTC(d.$y, e, t) : new Date(d.$y, e, t), d);
                    return c ? s : s.endOf(a);
                  },
                      f = function f(t, e) {
                    return w.w(d.toDate()[t].apply(d.toDate("s"), (c ? [0, 0, 0, 0] : [23, 59, 59, 999]).slice(e)), d);
                  },
                      g = this.$W,
                      m = this.$M,
                      b = this.$D,
                      y = "set" + (this.$u ? "UTC" : "");

                  switch (u) {
                    case o:
                      return c ? p(1, 0) : p(31, 11);

                    case r:
                      return c ? p(1, m) : p(0, m + 1);

                    case n:
                      var v = this.$locale().weekStart || 0,
                          C = (g < v ? g + 7 : g) - v;
                      return p(c ? b - C : b + (6 - C), m);

                    case a:
                    case l:
                      return f(y + "Hours", 0);

                    case i:
                      return f(y + "Minutes", 1);

                    case s:
                      return f(y + "Seconds", 2);

                    case e:
                      return f(y + "Milliseconds", 3);

                    default:
                      return this.clone();
                  }
                }, p.endOf = function (t) {
                  return this.startOf(t, !1);
                }, p.$set = function (n, h) {
                  var d,
                      c = w.p(n),
                      u = "set" + (this.$u ? "UTC" : ""),
                      p = (d = {}, d[a] = u + "Date", d[l] = u + "Date", d[r] = u + "Month", d[o] = u + "FullYear", d[i] = u + "Hours", d[s] = u + "Minutes", d[e] = u + "Seconds", d[t] = u + "Milliseconds", d)[c],
                      f = c === a ? this.$D + (h - this.$W) : h;

                  if (c === r || c === o) {
                    var g = this.clone().set(l, 1);
                    g.$d[p](f), g.init(), this.$d = g.set(l, Math.min(this.$D, g.daysInMonth())).$d;
                  } else p && this.$d[p](f);

                  return this.init(), this;
                }, p.set = function (t, e) {
                  return this.clone().$set(t, e);
                }, p.get = function (t) {
                  return this[w.p(t)]();
                }, p.add = function (t, h) {
                  var l,
                      d = this;
                  t = Number(t);

                  var c = w.p(h),
                      u = function u(e) {
                    var s = v(d);
                    return w.w(s.date(s.date() + Math.round(e * t)), d);
                  };

                  if (c === r) return this.set(r, this.$M + t);
                  if (c === o) return this.set(o, this.$y + t);
                  if (c === a) return u(1);
                  if (c === n) return u(7);
                  var p = (l = {}, l[s] = 6e4, l[i] = 36e5, l[e] = 1e3, l)[c] || 1,
                      f = this.$d.getTime() + t * p;
                  return w.w(f, this);
                }, p.subtract = function (t, e) {
                  return this.add(-1 * t, e);
                }, p.format = function (t) {
                  var e = this;
                  if (!this.isValid()) return "Invalid Date";

                  var s = t || "YYYY-MM-DDTHH:mm:ssZ",
                      i = w.z(this),
                      a = this.$locale(),
                      n = this.$H,
                      r = this.$m,
                      h = this.$M,
                      o = a.weekdays,
                      l = a.months,
                      d = function d(t, i, a, n) {
                    return t && (t[i] || t(e, s)) || a[i].substr(0, n);
                  },
                      u = function u(t) {
                    return w.s(n % 12 || 12, t, "0");
                  },
                      p = a.meridiem || function (t, e, s) {
                    var i = t < 12 ? "AM" : "PM";
                    return s ? i.toLowerCase() : i;
                  },
                      f = {
                    YY: String(this.$y).slice(-2),
                    YYYY: this.$y,
                    M: h + 1,
                    MM: w.s(h + 1, 2, "0"),
                    MMM: d(a.monthsShort, h, l, 3),
                    MMMM: d(l, h),
                    D: this.$D,
                    DD: w.s(this.$D, 2, "0"),
                    d: String(this.$W),
                    dd: d(a.weekdaysMin, this.$W, o, 2),
                    ddd: d(a.weekdaysShort, this.$W, o, 3),
                    dddd: o[this.$W],
                    H: String(n),
                    HH: w.s(n, 2, "0"),
                    h: u(1),
                    hh: u(2),
                    a: p(n, r, !0),
                    A: p(n, r, !1),
                    m: String(r),
                    mm: w.s(r, 2, "0"),
                    s: String(this.$s),
                    ss: w.s(this.$s, 2, "0"),
                    SSS: w.s(this.$ms, 3, "0"),
                    Z: i
                  };

                  return s.replace(c, function (t, e) {
                    return e || f[t] || i.replace(":", "");
                  });
                }, p.utcOffset = function () {
                  return 15 * -Math.round(this.$d.getTimezoneOffset() / 15);
                }, p.diff = function (t, l, d) {
                  var c,
                      u = w.p(l),
                      p = v(t),
                      f = 6e4 * (p.utcOffset() - this.utcOffset()),
                      g = this - p,
                      m = w.m(this, p);
                  return m = (c = {}, c[o] = m / 12, c[r] = m, c[h] = m / 3, c[n] = (g - f) / 6048e5, c[a] = (g - f) / 864e5, c[i] = g / 36e5, c[s] = g / 6e4, c[e] = g / 1e3, c)[u] || g, d ? m : w.a(m);
                }, p.daysInMonth = function () {
                  return this.endOf(r).$D;
                }, p.$locale = function () {
                  return m[this.$L];
                }, p.locale = function (t, e) {
                  if (!t) return this.$L;
                  var s = this.clone(),
                      i = y(t, e, !0);
                  return i && (s.$L = i), s;
                }, p.clone = function () {
                  return w.w(this.$d, this);
                }, p.toDate = function () {
                  return new Date(this.valueOf());
                }, p.toJSON = function () {
                  return this.isValid() ? this.toISOString() : null;
                }, p.toISOString = function () {
                  return this.$d.toISOString();
                }, p.toString = function () {
                  return this.$d.toUTCString();
                }, u;
              }(),
                  x = C.prototype;

              return v.prototype = x, [["$ms", t], ["$s", e], ["$m", s], ["$H", i], ["$W", a], ["$M", r], ["$y", o], ["$D", l]].forEach(function (t) {
                x[t[1]] = function (e) {
                  return this.$g(e, t[0], t[1]);
                };
              }), v.extend = function (t, e) {
                return t.$i || (t(e, C, v), t.$i = !0), v;
              }, v.locale = y, v.isDayjs = b, v.unix = function (t) {
                return v(1e3 * t);
              }, v.en = m[g], v.Ls = m, v.p = {}, v;
            }();
          }),
              a = e(function (t, e) {
            var s, i, a, n, r, h, o, l, d, c, u, p, f;
            t.exports = (s = {
              LTS: "h:mm:ss A",
              LT: "h:mm A",
              L: "MM/DD/YYYY",
              LL: "MMMM D, YYYY",
              LLL: "MMMM D, YYYY h:mm A",
              LLLL: "dddd, MMMM D, YYYY h:mm A"
            }, i = function i(t, e) {
              return t.replace(/(\[[^\]]+])|(LTS?|l{1,4}|L{1,4})/g, function (t, i, a) {
                var n = a && a.toUpperCase();
                return i || e[a] || s[a] || e[n].replace(/(\[[^\]]+])|(MMMM|MM|DD|dddd)/g, function (t, e, s) {
                  return e || s.slice(1);
                });
              });
            }, a = /(\[[^[]*\])|([-:/.()\s]+)|(A|a|YYYY|YY?|MM?M?M?|Do|DD?|hh?|HH?|mm?|ss?|S{1,3}|z|ZZ?)/g, o = {}, d = [/[+-]\d\d:?(\d\d)?/, function (t) {
              (this.zone || (this.zone = {})).offset = function (t) {
                if (!t) return 0;
                var e = t.match(/([+-]|\d\d)/g),
                    s = 60 * e[1] + (+e[2] || 0);
                return 0 === s ? 0 : "+" === e[0] ? -s : s;
              }(t);
            }], c = function c(t) {
              var e = o[t];
              return e && (e.indexOf ? e : e.s.concat(e.f));
            }, u = function u(t, e) {
              var s,
                  i = o.meridiem;

              if (i) {
                for (var a = 1; a <= 24; a += 1) {
                  if (t.indexOf(i(a, 0, e)) > -1) {
                    s = a > 12;
                    break;
                  }
                }
              } else s = t === (e ? "pm" : "PM");

              return s;
            }, p = {
              A: [h = /\d*[^\s\d-:/()]+/, function (t) {
                this.afternoon = u(t, !1);
              }],
              a: [h, function (t) {
                this.afternoon = u(t, !0);
              }],
              S: [/\d/, function (t) {
                this.milliseconds = 100 * +t;
              }],
              SS: [n = /\d\d/, function (t) {
                this.milliseconds = 10 * +t;
              }],
              SSS: [/\d{3}/, function (t) {
                this.milliseconds = +t;
              }],
              s: [r = /\d\d?/, (l = function l(t) {
                return function (e) {
                  this[t] = +e;
                };
              })("seconds")],
              ss: [r, l("seconds")],
              m: [r, l("minutes")],
              mm: [r, l("minutes")],
              H: [r, l("hours")],
              h: [r, l("hours")],
              HH: [r, l("hours")],
              hh: [r, l("hours")],
              D: [r, l("day")],
              DD: [n, l("day")],
              Do: [h, function (t) {
                var e = o.ordinal,
                    s = t.match(/\d+/);
                if (this.day = s[0], e) for (var i = 1; i <= 31; i += 1) {
                  e(i).replace(/\[|\]/g, "") === t && (this.day = i);
                }
              }],
              M: [r, l("month")],
              MM: [n, l("month")],
              MMM: [h, function (t) {
                var e = c("months"),
                    s = (c("monthsShort") || e.map(function (t) {
                  return t.substr(0, 3);
                })).indexOf(t) + 1;
                if (s < 1) throw new Error();
                this.month = s % 12 || s;
              }],
              MMMM: [h, function (t) {
                var e = c("months").indexOf(t) + 1;
                if (e < 1) throw new Error();
                this.month = e % 12 || e;
              }],
              Y: [/[+-]?\d+/, l("year")],
              YY: [n, function (t) {
                t = +t, this.year = t + (t > 68 ? 1900 : 2e3);
              }],
              YYYY: [/\d{4}/, l("year")],
              Z: d,
              ZZ: d
            }, f = function f(t, e, s) {
              try {
                var n = function (t) {
                  for (var e = (t = i(t, o && o.formats)).match(a), s = e.length, n = 0; n < s; n += 1) {
                    var r = e[n],
                        h = p[r],
                        l = h && h[0],
                        d = h && h[1];
                    e[n] = d ? {
                      regex: l,
                      parser: d
                    } : r.replace(/^\[|\]$/g, "");
                  }

                  return function (t) {
                    for (var i = {}, a = 0, n = 0; a < s; a += 1) {
                      var r = e[a];
                      if ("string" == typeof r) n += r.length;else {
                        var h = r.regex,
                            o = r.parser,
                            l = t.substr(n),
                            d = h.exec(l)[0];
                        o.call(i, d), t = t.replace(d, "");
                      }
                    }

                    return function (t) {
                      var e = t.afternoon;

                      if (void 0 !== e) {
                        var s = t.hours;
                        e ? s < 12 && (t.hours += 12) : 12 === s && (t.hours = 0), delete t.afternoon;
                      }
                    }(i), i;
                  };
                }(e)(t),
                    r = n.year,
                    h = n.month,
                    l = n.day,
                    d = n.hours,
                    c = n.minutes,
                    u = n.seconds,
                    f = n.milliseconds,
                    g = n.zone,
                    m = new Date(),
                    b = l || (r || h ? 1 : m.getDate()),
                    y = r || m.getFullYear(),
                    v = 0;

                r && !h || (v = h > 0 ? h - 1 : m.getMonth());
                var w = d || 0,
                    C = c || 0,
                    x = u || 0,
                    M = f || 0;
                return g ? new Date(Date.UTC(y, v, b, w, C, x, M + 60 * g.offset * 1e3)) : s ? new Date(Date.UTC(y, v, b, w, C, x, M)) : new Date(y, v, b, w, C, x, M);
              } catch (t) {
                return new Date("");
              }
            }, function (t, e, s) {
              s.p.customParseFormat = !0;
              var i = e.prototype,
                  a = i.parse;

              i.parse = function (t) {
                var e = t.date,
                    i = t.utc,
                    n = t.args;
                this.$u = i;
                var r = n[1];

                if ("string" == typeof r) {
                  var h = !0 === n[2],
                      l = !0 === n[3],
                      d = h || l,
                      c = n[2];
                  l && (c = n[2]), o = this.$locale(), !h && c && (o = s.Ls[c]), this.$d = f(e, r, i), this.init(), c && !0 !== c && (this.$L = this.locale(c).$L), d && e !== this.format(r) && (this.$d = new Date("")), o = {};
                } else if (r instanceof Array) for (var u = r.length, p = 1; p <= u; p += 1) {
                  n[1] = r[p - 1];
                  var g = s.apply(this, n);

                  if (g.isValid()) {
                    this.$d = g.$d, this.$L = g.$L, this.init();
                    break;
                  }

                  p === u && (this.$d = new Date(""));
                } else a.call(this, t);
              };
            });
          });
          i.extend(a), s.parseDate = function (t, e) {
            var s = !1;
            if (e) switch (e) {
              case "ISO_8601":
                s = t;
                break;

              case "RFC_2822":
                s = i(t, "ddd, MM MMM YYYY HH:mm:ss ZZ").format("YYYYMMDD");
                break;

              case "MYSQL":
                s = i(t, "YYYY-MM-DD hh:mm:ss").format("YYYYMMDD");
                break;

              case "UNIX":
                s = i(t).unix();
                break;

              default:
                s = i(t, e).format("YYYYMMDD");
            }
            return s;
          };
        }).call(this);
      }).call(this, "undefined" != typeof global ? global : "undefined" != typeof self ? self : "undefined" != typeof window ? window : {});
    }, {}],
    2: [function (t, e, s) {
      "use strict";

      Object.defineProperty(s, "__esModule", {
        value: !0
      });

      var i = function i(t) {
        return "[object Object]" === Object.prototype.toString.call(t);
      },
          a = function a(t, e) {
        var s = document.createElement(t);
        if (e && "object" == _typeof(e)) for (var _t in e) {
          "html" === _t ? s.innerHTML = e[_t] : s.setAttribute(_t, e[_t]);
        }
        return s;
      },
          n = function n(t) {
        t instanceof NodeList ? t.forEach(function (t) {
          return n(t);
        }) : t.innerHTML = "";
      },
          r = function r(t, e, s) {
        return a("li", {
          "class": t,
          html: "<a href=\"#\" data-page=\"".concat(e, "\">").concat(s, "</a>")
        });
      },
          h = function h(t, e) {
        var s, i;
        1 === e ? (s = 0, i = t.length) : -1 === e && (s = t.length - 1, i = -1);

        for (var _a = !0; _a;) {
          _a = !1;

          for (var _n = s; _n != i; _n += e) {
            if (t[_n + e] && t[_n].value > t[_n + e].value) {
              var _s = t[_n],
                  _i = t[_n + e],
                  _r = _s;
              t[_n] = _i, t[_n + e] = _r, _a = !0;
            }
          }
        }

        return t;
      };

      var o =
      /*#__PURE__*/
      function () {
        function o(t, e) {
          _classCallCheck(this, o);

          return this.dt = t, this.rows = e, this;
        }

        _createClass(o, [{
          key: "build",
          value: function build(t) {
            var e = a("tr");
            var s = this.dt.headings;
            return s.length || (s = t.map(function () {
              return "";
            })), s.forEach(function (s, i) {
              var n = a("td");
              t[i] && t[i].length || (t[i] = ""), n.innerHTML = t[i], n.data = t[i], e.appendChild(n);
            }), e;
          }
        }, {
          key: "render",
          value: function render(t) {
            return t;
          }
        }, {
          key: "add",
          value: function add(t) {
            var _this = this;

            if (Array.isArray(t)) {
              var _e = this.dt;
              Array.isArray(t[0]) ? t.forEach(function (t) {
                _e.data.push(_this.build(t));
              }) : _e.data.push(this.build(t)), _e.data.length && (_e.hasRows = !0), this.update(), _e.columns().rebuild();
            }
          }
        }, {
          key: "remove",
          value: function remove(t) {
            var e = this.dt;
            Array.isArray(t) ? (t.sort(function (t, e) {
              return e - t;
            }), t.forEach(function (t) {
              e.data.splice(t, 1);
            })) : "all" == t ? e.data = [] : e.data.splice(t, 1), e.data.length || (e.hasRows = !1), this.update(), e.columns().rebuild();
          }
        }, {
          key: "update",
          value: function update() {
            this.dt.data.forEach(function (t, e) {
              t.dataIndex = e;
            });
          }
        }]);

        return o;
      }();

      var l =
      /*#__PURE__*/
      function () {
        function l(t) {
          _classCallCheck(this, l);

          return this.dt = t, this;
        }

        _createClass(l, [{
          key: "swap",
          value: function swap(t) {
            if (t.length && 2 === t.length) {
              var _e2 = [];
              this.dt.headings.forEach(function (t, s) {
                _e2.push(s);
              });
              var _s2 = t[0],
                  _i2 = t[1],
                  _a2 = _e2[_i2];
              _e2[_i2] = _e2[_s2], _e2[_s2] = _a2, this.order(_e2);
            }
          }
        }, {
          key: "order",
          value: function order(t) {
            var e, s, i, a, n, r, h;
            var o = [[], [], [], []],
                l = this.dt;
            t.forEach(function (t, i) {
              n = l.headings[t], r = "false" !== n.getAttribute("data-sortable"), e = n.cloneNode(!0), e.originalCellIndex = i, e.sortable = r, o[0].push(e), l.hiddenColumns.includes(t) || (s = n.cloneNode(!0), s.originalCellIndex = i, s.sortable = r, o[1].push(s));
            }), l.data.forEach(function (e, s) {
              i = e.cloneNode(!1), a = e.cloneNode(!1), i.dataIndex = a.dataIndex = s, null !== e.searchIndex && void 0 !== e.searchIndex && (i.searchIndex = a.searchIndex = e.searchIndex), t.forEach(function (t) {
                h = e.cells[t].cloneNode(!0), h.data = e.cells[t].data, i.appendChild(h), l.hiddenColumns.includes(t) || (h = e.cells[t].cloneNode(!0), h.data = e.cells[t].data, a.appendChild(h));
              }), o[2].push(i), o[3].push(a);
            }), l.headings = o[0], l.activeHeadings = o[1], l.data = o[2], l.activeRows = o[3], l.update();
          }
        }, {
          key: "hide",
          value: function hide(t) {
            if (t.length) {
              var _e3 = this.dt;
              t.forEach(function (t) {
                _e3.hiddenColumns.includes(t) || _e3.hiddenColumns.push(t);
              }), this.rebuild();
            }
          }
        }, {
          key: "show",
          value: function show(t) {
            if (t.length) {
              var _e4;

              var _s3 = this.dt;
              t.forEach(function (t) {
                _e4 = _s3.hiddenColumns.indexOf(t), _e4 > -1 && _s3.hiddenColumns.splice(_e4, 1);
              }), this.rebuild();
            }
          }
        }, {
          key: "visible",
          value: function visible(t) {
            var e;
            var s = this.dt;
            return t = t || s.headings.map(function (t) {
              return t.originalCellIndex;
            }), isNaN(t) ? Array.isArray(t) && (e = [], t.forEach(function (t) {
              e.push(!s.hiddenColumns.includes(t));
            })) : e = !s.hiddenColumns.includes(t), e;
          }
        }, {
          key: "add",
          value: function add(t) {
            var _this2 = this;

            var e;
            var s = document.createElement("th");
            if (!this.dt.headings.length) return this.dt.insert({
              headings: [t.heading],
              data: t.data.map(function (t) {
                return [t];
              })
            }), void this.rebuild();
            this.dt.hiddenHeader ? s.innerHTML = "" : t.heading.nodeName ? s.appendChild(t.heading) : s.innerHTML = t.heading, this.dt.headings.push(s), this.dt.data.forEach(function (s, i) {
              t.data[i] && (e = document.createElement("td"), t.data[i].nodeName ? e.appendChild(t.data[i]) : e.innerHTML = t.data[i], e.data = e.innerHTML, t.render && (e.innerHTML = t.render.call(_this2, e.data, e, s)), s.appendChild(e));
            }), t.type && s.setAttribute("data-type", t.type), t.format && s.setAttribute("data-format", t.format), t.hasOwnProperty("sortable") && (s.sortable = t.sortable, s.setAttribute("data-sortable", !0 === t.sortable ? "true" : "false")), this.rebuild(), this.dt.renderHeader();
          }
        }, {
          key: "remove",
          value: function remove(t) {
            var _this3 = this;

            Array.isArray(t) ? (t.sort(function (t, e) {
              return e - t;
            }), t.forEach(function (t) {
              return _this3.remove(t);
            })) : (this.dt.headings.splice(t, 1), this.dt.data.forEach(function (e) {
              e.removeChild(e.cells[t]);
            })), this.rebuild();
          }
        }, {
          key: "filter",
          value: function filter(t, e, s, i) {
            var a = this.dt;

            if (a.filterState || (a.filterState = {
              originalData: a.data
            }), !a.filterState[t]) {
              var _e5 = [].concat(_toConsumableArray(i), [function () {
                return !0;
              }]);

              a.filterState[t] = function () {
                var t = 0;
                return function () {
                  return _e5[t++ % _e5.length];
                };
              }();
            }

            var n = a.filterState[t](),
                r = Array.from(a.filterState.originalData).filter(function (e) {
              var s = e.cells[t],
                  i = s.hasAttribute("data-content") ? s.getAttribute("data-content") : s.innerText;
              return "function" == typeof n ? n(i) : i === n;
            });
            a.data = r, this.rebuild(), a.update(), s || a.emit("datatable.sort", t, e);
          }
        }, {
          key: "sort",
          value: function sort(e, s, i) {
            var _this4 = this;

            var a = this.dt;
            if (a.hasHeadings && (e < 0 || e > a.headings.length)) return !1;
            var n = a.options.filters && a.options.filters[a.headings[e].textContent];
            if (n && 0 !== n.length) return void this.filter(e, s, i, n);
            a.sorting = !0, i || a.emit("datatable.sorting", e, s);
            var r = a.data;
            var o = [],
                l = [];
            var d = 0,
                c = 0;
            var u = a.headings[e],
                p = [];

            if ("date" === u.getAttribute("data-type")) {
              var _e6 = !1;

              u.hasAttribute("data-format") && (_e6 = u.getAttribute("data-format")), p.push(Promise.resolve().then(function () {
                return t("./date-cd1c23ce.js");
              }).then(function (_ref) {
                var t = _ref.parseDate;
                return function (s) {
                  return t(s, _e6);
                };
              }));
            }

            Promise.all(p).then(function (t) {
              var n = t[0];
              var p, f;
              Array.from(r).forEach(function (t) {
                var s = t.cells[e],
                    i = s.hasAttribute("data-content") ? s.getAttribute("data-content") : s.innerText;
                var a;
                a = n ? n(i) : "string" == typeof i ? i.replace(/(\$|,|\s|%)/g, "") : i, parseFloat(a) == a ? l[c++] = {
                  value: Number(a),
                  row: t
                } : o[d++] = {
                  value: "string" == typeof i ? i.toLowerCase() : i,
                  row: t
                };
              }), s || (s = u.classList.contains("asc") ? "desc" : "asc"), "desc" == s ? (p = h(o, -1), f = h(l, -1), u.classList.remove("asc"), u.classList.add("desc")) : (p = h(l, 1), f = h(o, 1), u.classList.remove("desc"), u.classList.add("asc")), a.lastTh && u != a.lastTh && (a.lastTh.classList.remove("desc"), a.lastTh.classList.remove("asc")), a.lastTh = u, r = p.concat(f), a.data = [];
              var g = [];
              r.forEach(function (t, e) {
                a.data.push(t.row), null !== t.row.searchIndex && void 0 !== t.row.searchIndex && g.push(e);
              }), a.searchData = g, _this4.rebuild(), a.update(), i || a.emit("datatable.sort", e, s);
            });
          }
        }, {
          key: "rebuild",
          value: function rebuild() {
            var t, e, s, i;
            var a = this.dt,
                n = [];
            a.activeRows = [], a.activeHeadings = [], a.headings.forEach(function (t, e) {
              t.originalCellIndex = e, t.sortable = "false" !== t.getAttribute("data-sortable"), a.hiddenColumns.includes(e) || a.activeHeadings.push(t);
            }), a.data.forEach(function (r, h) {
              t = r.cloneNode(!1), e = r.cloneNode(!1), t.dataIndex = e.dataIndex = h, null !== r.searchIndex && void 0 !== r.searchIndex && (t.searchIndex = e.searchIndex = r.searchIndex), Array.from(r.cells).forEach(function (n) {
                s = n.cloneNode(!0), s.data = n.data, t.appendChild(s), a.hiddenColumns.includes(s.cellIndex) || (i = s.cloneNode(!0), i.data = s.data, e.appendChild(i));
              }), n.push(t), a.activeRows.push(e);
            }), a.data = n, a.update();
          }
        }]);

        return l;
      }();

      var d = function d(t) {
        var e = !1,
            s = !1;

        if ((t = t || this.options.data).headings) {
          e = a("thead");

          var _s4 = a("tr");

          t.headings.forEach(function (t) {
            var e = a("th", {
              html: t
            });

            _s4.appendChild(e);
          }), e.appendChild(_s4);
        }

        t.data && t.data.length && (s = a("tbody"), t.data.forEach(function (e) {
          if (t.headings && t.headings.length !== e.length) throw new Error("The number of rows do not match the number of headings.");
          var i = a("tr");
          e.forEach(function (t) {
            var e = a("td", {
              html: t
            });
            i.appendChild(e);
          }), s.appendChild(i);
        })), e && (null !== this.table.tHead && this.table.removeChild(this.table.tHead), this.table.appendChild(e)), s && (this.table.tBodies.length && this.table.removeChild(this.table.tBodies[0]), this.table.appendChild(s));
      },
          c = {
        sortable: !0,
        searchable: !0,
        paging: !0,
        perPage: 10,
        perPageSelect: [5, 10, 15, 20, 25],
        nextPrev: !0,
        firstLast: !1,
        prevText: "&lsaquo;",
        nextText: "&rsaquo;",
        firstText: "&laquo;",
        lastText: "&raquo;",
        ellipsisText: "&hellip;",
        ascText: "▴",
        descText: "▾",
        truncatePager: !0,
        pagerDelta: 2,
        scrollY: "",
        fixedColumns: !0,
        fixedHeight: !1,
        header: !0,
        hiddenHeader: !1,
        footer: !1,
        labels: {
          placeholder: "Search...",
          perPage: "{select} per page",
          noRows: "No Data found",
          info: "Showing {start} to {end} of {rows} entries"
        },
        layout: {
          top: "{select}{search}",
          bottom: "{info}{pager}"
        }
      };

      var u =
      /*#__PURE__*/
      function () {
        function u(t) {
          var _this5 = this;

          var e = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};

          _classCallCheck(this, u);

          if (this.initialized = !1, this.options = _objectSpread({}, c, {}, e, {
            layout: _objectSpread({}, c.layout, {}, e.layout),
            labels: _objectSpread({}, c.labels, {}, e.labels)
          }), "string" == typeof t && (t = document.querySelector(t)), this.initialLayout = t.innerHTML, this.initialSortable = this.options.sortable, this.options.header || (this.options.sortable = !1), null === t.tHead && (!this.options.data || this.options.data && !this.options.data.headings) && (this.options.sortable = !1), t.tBodies.length && !t.tBodies[0].rows.length && this.options.data && !this.options.data.data) throw new Error("You seem to be using the data option, but you've not defined any rows.");
          this.table = t, this.listeners = {
            onResize: function onResize(t) {
              return _this5.onResize(t);
            }
          }, this.init();
        }

        _createClass(u, [{
          key: "init",
          value: function init(t) {
            var _this6 = this;

            if (this.initialized || this.table.classList.contains("dataTable-table")) return !1;
            Object.assign(this.options, t || {}), this.currentPage = 1, this.onFirstPage = !0, this.hiddenColumns = [], this.columnRenderers = [], this.selectedColumns = [], this.render(), setTimeout(function () {
              _this6.emit("datatable.init"), _this6.initialized = !0, _this6.options.plugins && Object.entries(_this6.options.plugins).forEach(function (_ref2) {
                var _ref3 = _slicedToArray(_ref2, 2),
                    t = _ref3[0],
                    e = _ref3[1];

                _this6[t] && "function" == typeof _this6[t] && (_this6[t] = _this6[t](e, {
                  createElement: a
                }), e.enabled && _this6[t].init && "function" == typeof _this6[t].init && _this6[t].init());
              });
            }, 10);
          }
        }, {
          key: "render",
          value: function render(t) {
            if (t) {
              switch (t) {
                case "page":
                  this.renderPage();
                  break;

                case "pager":
                  this.renderPager();
                  break;

                case "header":
                  this.renderHeader();
              }

              return !1;
            }

            var e = this.options;
            var s = "";

            if (e.data && d.call(this), this.body = this.table.tBodies[0], this.head = this.table.tHead, this.foot = this.table.tFoot, this.body || (this.body = a("tbody"), this.table.appendChild(this.body)), this.hasRows = this.body.rows.length > 0, !this.head) {
              var _t2 = a("thead"),
                  _s5 = a("tr");

              this.hasRows && (Array.from(this.body.rows[0].cells).forEach(function () {
                _s5.appendChild(a("th"));
              }), _t2.appendChild(_s5)), this.head = _t2, this.table.insertBefore(this.head, this.body), this.hiddenHeader = e.hiddenHeader;
            }

            if (this.headings = [], this.hasHeadings = this.head.rows.length > 0, this.hasHeadings && (this.header = this.head.rows[0], this.headings = [].slice.call(this.header.cells)), e.header || this.head && this.table.removeChild(this.table.tHead), e.footer ? this.head && !this.foot && (this.foot = a("tfoot", {
              html: this.head.innerHTML
            }), this.table.appendChild(this.foot)) : this.foot && this.table.removeChild(this.table.tFoot), this.wrapper = a("div", {
              "class": "dataTable-wrapper dataTable-loading"
            }), s += "<div class='dataTable-top'>", s += e.layout.top, s += "</div>", e.scrollY.length ? s += "<div class='dataTable-container' style='height: ".concat(e.scrollY, "; overflow-Y: auto;'></div>") : s += "<div class='dataTable-container'></div>", s += "<div class='dataTable-bottom'>", s += e.layout.bottom, s += "</div>", s = s.replace("{info}", e.paging ? "<div class='dataTable-info'></div>" : ""), e.paging && e.perPageSelect) {
              var _t3 = "<div class='dataTable-dropdown'><label>";
              _t3 += e.labels.perPage, _t3 += "</label></div>";

              var _i3 = a("select", {
                "class": "dataTable-selector"
              });

              e.perPageSelect.forEach(function (t) {
                var s = t === e.perPage,
                    a = new Option(t, t, s, s);

                _i3.add(a);
              }), _t3 = _t3.replace("{select}", _i3.outerHTML), s = s.replace("{select}", _t3);
            } else s = s.replace("{select}", "");

            if (e.searchable) {
              var _t4 = "<div class='dataTable-search'><input class='dataTable-input' placeholder='".concat(e.labels.placeholder, "' type='text'></div>");

              s = s.replace("{search}", _t4);
            } else s = s.replace("{search}", "");

            this.hasHeadings && this.render("header"), this.table.classList.add("dataTable-table");
            var i = a("nav", {
              "class": "dataTable-pagination"
            }),
                n = a("ul", {
              "class": "dataTable-pagination-list"
            });
            i.appendChild(n), s = s.replace(/\{pager\}/g, i.outerHTML), this.wrapper.innerHTML = s, this.container = this.wrapper.querySelector(".dataTable-container"), this.pagers = this.wrapper.querySelectorAll(".dataTable-pagination-list"), this.label = this.wrapper.querySelector(".dataTable-info"), this.table.parentNode.replaceChild(this.wrapper, this.table), this.container.appendChild(this.table), this.rect = this.table.getBoundingClientRect(), this.data = Array.from(this.body.rows), this.activeRows = this.data.slice(), this.activeHeadings = this.headings.slice(), this.update(), this.setColumns(), this.fixHeight(), this.fixColumns(), e.header || this.wrapper.classList.add("no-header"), e.footer || this.wrapper.classList.add("no-footer"), e.sortable && this.wrapper.classList.add("sortable"), e.searchable && this.wrapper.classList.add("searchable"), e.fixedHeight && this.wrapper.classList.add("fixed-height"), e.fixedColumns && this.wrapper.classList.add("fixed-columns"), this.bindEvents();
          }
        }, {
          key: "renderPage",
          value: function renderPage() {
            var _this7 = this;

            if (this.hasHeadings && (n(this.header), this.activeHeadings.forEach(function (t) {
              return _this7.header.appendChild(t);
            })), this.hasRows && this.totalPages) {
              this.currentPage > this.totalPages && (this.currentPage = 1);

              var _t5 = this.currentPage - 1,
                  _e7 = document.createDocumentFragment();

              this.pages[_t5].forEach(function (t) {
                return _e7.appendChild(_this7.rows().render(t));
              }), this.clear(_e7), this.onFirstPage = 1 === this.currentPage, this.onLastPage = this.currentPage === this.lastPage;
            } else this.setMessage(this.options.labels.noRows);

            var t,
                e = 0,
                s = 0,
                i = 0;

            if (this.totalPages && (e = this.currentPage - 1, s = e * this.options.perPage, i = s + this.pages[e].length, s += 1, t = this.searching ? this.searchData.length : this.data.length), this.label && this.options.labels.info.length) {
              var _e8 = this.options.labels.info.replace("{start}", s).replace("{end}", i).replace("{page}", this.currentPage).replace("{pages}", this.totalPages).replace("{rows}", t);

              this.label.innerHTML = t ? _e8 : "";
            }

            1 == this.currentPage && this.fixHeight();
          }
        }, {
          key: "renderPager",
          value: function renderPager() {
            if (n(this.pagers), this.totalPages > 1) {
              var _t6 = "pager",
                  _e9 = document.createDocumentFragment(),
                  _s6 = this.onFirstPage ? 1 : this.currentPage - 1,
                  _i4 = this.onLastPage ? this.totalPages : this.currentPage + 1;

              this.options.firstLast && _e9.appendChild(r(_t6, 1, this.options.firstText)), this.options.nextPrev && _e9.appendChild(r(_t6, _s6, this.options.prevText));
              var _n2 = this.links;
              this.options.truncatePager && (_n2 = function (t, e, s, i, n) {
                var r;
                var h = 2 * (i = i || 2);
                var o = e - i,
                    l = e + i;
                var d = [],
                    c = [];
                e < 4 - i + h ? l = 3 + h : e > s - (3 - i + h) && (o = s - (2 + h));

                for (var _e10 = 1; _e10 <= s; _e10++) {
                  if (1 == _e10 || _e10 == s || _e10 >= o && _e10 <= l) {
                    var _s7 = t[_e10 - 1];
                    _s7.classList.remove("active"), d.push(_s7);
                  }
                }

                return d.forEach(function (e) {
                  var s = e.children[0].getAttribute("data-page");

                  if (r) {
                    var _e11 = r.children[0].getAttribute("data-page");

                    if (s - _e11 == 2) c.push(t[_e11]);else if (s - _e11 != 1) {
                      var _t7 = a("li", {
                        "class": "ellipsis",
                        html: "<a href=\"#\">".concat(n, "</a>")
                      });

                      c.push(_t7);
                    }
                  }

                  c.push(e), r = e;
                }), c;
              }(this.links, this.currentPage, this.pages.length, this.options.pagerDelta, this.options.ellipsisText)), this.links[this.currentPage - 1].classList.add("active"), _n2.forEach(function (t) {
                t.classList.remove("active"), _e9.appendChild(t);
              }), this.links[this.currentPage - 1].classList.add("active"), this.options.nextPrev && _e9.appendChild(r(_t6, _i4, this.options.nextText)), this.options.firstLast && _e9.appendChild(r(_t6, this.totalPages, this.options.lastText)), this.pagers.forEach(function (t) {
                t.appendChild(_e9.cloneNode(!0));
              });
            }
          }
        }, {
          key: "renderHeader",
          value: function renderHeader() {
            var _this8 = this;

            this.labels = [], this.headings && this.headings.length && this.headings.forEach(function (t, e) {
              if (_this8.labels[e] = t.textContent, t.firstElementChild && t.firstElementChild.classList.contains("dataTable-sorter") && (t.innerHTML = t.firstElementChild.innerHTML), t.sortable = "false" !== t.getAttribute("data-sortable"), t.originalCellIndex = e, _this8.options.sortable && t.sortable) {
                var _e12 = a("a", {
                  href: "#",
                  "class": "dataTable-sorter",
                  html: t.innerHTML
                });

                t.innerHTML = "", t.setAttribute("data-sortable", ""), t.appendChild(_e12);
              }
            }), this.fixColumns();
          }
        }, {
          key: "bindEvents",
          value: function bindEvents() {
            var _this9 = this;

            var t = this.options;

            if (t.perPageSelect) {
              var _e13 = this.wrapper.querySelector(".dataTable-selector");

              _e13 && _e13.addEventListener("change", function () {
                t.perPage = parseInt(_e13.value, 10), _this9.update(), _this9.fixHeight(), _this9.emit("datatable.perpage", t.perPage);
              }, !1);
            }

            t.searchable && (this.input = this.wrapper.querySelector(".dataTable-input"), this.input && this.input.addEventListener("keyup", function () {
              return _this9.search(_this9.input.value);
            }, !1)), this.wrapper.addEventListener("click", function (e) {
              var s = e.target.closest("a");
              s && "a" === s.nodeName.toLowerCase() && (s.hasAttribute("data-page") ? (_this9.page(s.getAttribute("data-page")), e.preventDefault()) : t.sortable && s.classList.contains("dataTable-sorter") && "false" != s.parentNode.getAttribute("data-sortable") && (_this9.columns().sort(_this9.headings.indexOf(s.parentNode)), e.preventDefault()));
            }, !1), window.addEventListener("resize", this.listeners.onResize);
          }
        }, {
          key: "onResize",
          value: function onResize() {
            this.rect = this.container.getBoundingClientRect(), this.rect.width && this.fixColumns();
          }
        }, {
          key: "setColumns",
          value: function setColumns(t) {
            var _this10 = this;

            t || this.data.forEach(function (t) {
              Array.from(t.cells).forEach(function (t) {
                t.data = t.innerHTML;
              });
            }), this.options.columns && this.headings.length && this.options.columns.forEach(function (t) {
              Array.isArray(t.select) || (t.select = [t.select]), t.hasOwnProperty("render") && "function" == typeof t.render && (_this10.selectedColumns = _this10.selectedColumns.concat(t.select), _this10.columnRenderers.push({
                columns: t.select,
                renderer: t.render
              })), t.select.forEach(function (e) {
                var s = _this10.headings[e];
                t.type && s.setAttribute("data-type", t.type), t.format && s.setAttribute("data-format", t.format), t.hasOwnProperty("sortable") && s.setAttribute("data-sortable", t.sortable), t.hasOwnProperty("hidden") && !1 !== t.hidden && _this10.columns().hide([e]), t.hasOwnProperty("sort") && 1 === t.select.length && _this10.columns().sort(t.select[0], t.sort, !0);
              });
            }), this.hasRows && (this.data.forEach(function (t, e) {
              t.dataIndex = e, Array.from(t.cells).forEach(function (t) {
                t.data = t.innerHTML;
              });
            }), this.selectedColumns.length && this.data.forEach(function (t) {
              Array.from(t.cells).forEach(function (e, s) {
                _this10.selectedColumns.includes(s) && _this10.columnRenderers.forEach(function (i) {
                  i.columns.includes(s) && (e.innerHTML = i.renderer.call(_this10, e.data, e, t));
                });
              });
            }), this.columns().rebuild()), this.render("header");
          }
        }, {
          key: "destroy",
          value: function destroy() {
            this.table.innerHTML = this.initialLayout, this.table.classList.remove("dataTable-table"), this.wrapper.parentNode.replaceChild(this.table, this.wrapper), this.initialized = !1, window.removeEventListener("resize", this.listeners.onResize);
          }
        }, {
          key: "update",
          value: function update() {
            this.wrapper.classList.remove("dataTable-empty"), this.paginate(this), this.render("page"), this.links = [];
            var t = this.pages.length;

            for (; t--;) {
              var _e14 = t + 1;

              this.links[t] = r(0 === t ? "active" : "", _e14, _e14);
            }

            this.sorting = !1, this.render("pager"), this.rows().update(), this.emit("datatable.update");
          }
        }, {
          key: "paginate",
          value: function paginate() {
            var _this11 = this;

            var t = this.options.perPage;
            var e = this.activeRows;
            return this.searching && (e = [], this.searchData.forEach(function (t) {
              return e.push(_this11.activeRows[t]);
            })), this.options.paging ? this.pages = e.map(function (s, i) {
              return i % t == 0 ? e.slice(i, i + t) : null;
            }).filter(function (t) {
              return t;
            }) : this.pages = [e], this.totalPages = this.lastPage = this.pages.length, this.totalPages;
          }
        }, {
          key: "fixColumns",
          value: function fixColumns() {
            var _this12 = this;

            if ((this.options.scrollY.length || this.options.fixedColumns) && this.activeHeadings && this.activeHeadings.length) {
              var _t8,
                  _e15 = !1;

              if (this.columnWidths = [], this.table.tHead) {
                if (this.options.scrollY.length && (_e15 = a("thead"), _e15.appendChild(a("tr")), _e15.style.height = "0px", this.headerTable && (this.table.tHead = this.headerTable.tHead)), this.activeHeadings.forEach(function (t) {
                  t.style.width = "";
                }), this.activeHeadings.forEach(function (t, s) {
                  var i = t.offsetWidth,
                      n = i / _this12.rect.width * 100;

                  if (t.style.width = n + "%", _this12.columnWidths[s] = i, _this12.options.scrollY.length) {
                    var _t9 = a("th");

                    _e15.firstElementChild.appendChild(_t9), _t9.style.width = n + "%", _t9.style.paddingTop = "0", _t9.style.paddingBottom = "0", _t9.style.border = "0";
                  }
                }), this.options.scrollY.length) {
                  var _t10 = this.table.parentElement;

                  if (!this.headerTable) {
                    this.headerTable = a("table", {
                      "class": "dataTable-table"
                    });

                    var _e16 = a("div", {
                      "class": "dataTable-headercontainer"
                    });

                    _e16.appendChild(this.headerTable), _t10.parentElement.insertBefore(_e16, _t10);
                  }

                  var _s8 = this.table.tHead;
                  this.table.replaceChild(_e15, _s8), this.headerTable.tHead = _s8, this.headerTable.parentElement.style.paddingRight = this.headerTable.clientWidth - this.table.clientWidth + parseInt(this.headerTable.parentElement.style.paddingRight || "0", 10) + "px", _t10.scrollHeight > _t10.clientHeight && (_t10.style.overflowY = "scroll");
                }
              } else {
                _t8 = [], _e15 = a("thead");

                var _s9 = a("tr");

                Array.from(this.table.tBodies[0].rows[0].cells).forEach(function () {
                  var e = a("th");
                  _s9.appendChild(e), _t8.push(e);
                }), _e15.appendChild(_s9), this.table.insertBefore(_e15, this.body);
                var _i5 = [];
                _t8.forEach(function (t, e) {
                  var s = t.offsetWidth,
                      a = s / _this12.rect.width * 100;
                  _i5.push(a), _this12.columnWidths[e] = s;
                }), this.data.forEach(function (t) {
                  Array.from(t.cells).forEach(function (t, e) {
                    _this12.columns(t.cellIndex).visible() && (t.style.width = _i5[e] + "%");
                  });
                }), this.table.removeChild(_e15);
              }
            }
          }
        }, {
          key: "fixHeight",
          value: function fixHeight() {
            this.options.fixedHeight && (this.container.style.height = null, this.rect = this.container.getBoundingClientRect(), this.container.style.height = this.rect.height + "px");
          }
        }, {
          key: "search",
          value: function search(t) {
            var _this13 = this;

            return !!this.hasRows && (t = t.toLowerCase(), this.currentPage = 1, this.searching = !0, this.searchData = [], t.length ? (this.clear(), this.data.forEach(function (e, s) {
              var i = _this13.searchData.includes(e);

              t.split(" ").reduce(function (t, s) {
                var i = !1,
                    a = null,
                    n = null;

                for (var _t11 = 0; _t11 < e.cells.length; _t11++) {
                  if (a = e.cells[_t11], n = a.hasAttribute("data-content") ? a.getAttribute("data-content") : a.textContent, n.toLowerCase().includes(s) && _this13.columns(a.cellIndex).visible()) {
                    i = !0;
                    break;
                  }
                }

                return t && i;
              }, !0) && !i ? (e.searchIndex = s, _this13.searchData.push(s)) : e.searchIndex = null;
            }), this.wrapper.classList.add("search-results"), this.searchData.length ? this.update() : (this.wrapper.classList.remove("search-results"), this.setMessage(this.options.labels.noRows)), void this.emit("datatable.search", t, this.searchData)) : (this.searching = !1, this.update(), this.emit("datatable.search", t, this.searchData), this.wrapper.classList.remove("search-results"), !1));
          }
        }, {
          key: "page",
          value: function page(t) {
            return t != this.currentPage && (isNaN(t) || (this.currentPage = parseInt(t, 10)), !(t > this.pages.length || t < 0) && (this.render("page"), this.render("pager"), void this.emit("datatable.page", t)));
          }
        }, {
          key: "sortColumn",
          value: function sortColumn(t, e) {
            this.columns().sort(t, e);
          }
        }, {
          key: "insert",
          value: function insert(t) {
            var _this14 = this;

            var e = [];

            if (i(t)) {
              if (t.headings && !this.hasHeadings && !this.hasRows) {
                var _e17 = a("tr");

                t.headings.forEach(function (t) {
                  var s = a("th", {
                    html: t
                  });

                  _e17.appendChild(s);
                }), this.head.appendChild(_e17), this.header = _e17, this.headings = [].slice.call(_e17.cells), this.hasHeadings = !0, this.options.sortable = this.initialSortable, this.render("header"), this.activeHeadings = this.headings.slice();
              }

              t.data && Array.isArray(t.data) && (e = t.data);
            } else Array.isArray(t) && t.forEach(function (t) {
              var s = [];
              Object.entries(t).forEach(function (_ref4) {
                var _ref5 = _slicedToArray(_ref4, 2),
                    t = _ref5[0],
                    e = _ref5[1];

                var i = _this14.labels.indexOf(t);

                i > -1 && (s[i] = e);
              }), e.push(s);
            });

            e.length && (this.rows().add(e), this.hasRows = !0), this.update(), this.setColumns(), this.fixColumns();
          }
        }, {
          key: "refresh",
          value: function refresh() {
            this.options.searchable && (this.input.value = "", this.searching = !1), this.currentPage = 1, this.onFirstPage = !0, this.update(), this.emit("datatable.refresh");
          }
        }, {
          key: "clear",
          value: function clear(t) {
            this.body && n(this.body);
            var e = this.body;
            this.body || (e = this.table), t && ("string" == typeof t && (document.createDocumentFragment().innerHTML = t), e.appendChild(t));
          }
        }, {
          key: "export",
          value: function _export(t) {
            if (!this.hasHeadings && !this.hasRows) return !1;
            var e = this.activeHeadings;
            var s = [];
            var a = [];
            var n, r, h, o;
            if (!i(t)) return !1;

            var l = _objectSpread({
              download: !0,
              skipColumn: [],
              lineDelimiter: "\n",
              columnDelimiter: ",",
              tableName: "myTable",
              replacer: null,
              space: 4
            }, t);

            if (l.type) {
              if ("txt" !== l.type && "csv" !== l.type || (s[0] = this.header), l.selection) {
                if (isNaN(l.selection)) {
                  if (Array.isArray(l.selection)) for (n = 0; n < l.selection.length; n++) {
                    s = s.concat(this.pages[l.selection[n] - 1]);
                  }
                } else s = s.concat(this.pages[l.selection - 1]);
              } else s = s.concat(this.activeRows);

              if (s.length) {
                if ("txt" === l.type || "csv" === l.type) {
                  for (h = "", n = 0; n < s.length; n++) {
                    for (r = 0; r < s[n].cells.length; r++) {
                      if (!l.skipColumn.includes(e[r].originalCellIndex) && this.columns(e[r].originalCellIndex).visible()) {
                        var _t12 = s[n].cells[r].textContent;
                        _t12 = _t12.trim(), _t12 = _t12.replace(/\s{2,}/g, " "), _t12 = _t12.replace(/\n/g, "  "), _t12 = _t12.replace(/"/g, '""'), _t12 = _t12.replace(/#/g, "%23"), _t12.includes(",") && (_t12 = "\"".concat(_t12, "\"")), h += _t12 + l.columnDelimiter;
                      }
                    }

                    h = h.trim().substring(0, h.length - 1), h += l.lineDelimiter;
                  }

                  h = h.trim().substring(0, h.length - 1), l.download && (h = "data:text/csv;charset=utf-8," + h);
                } else if ("sql" === l.type) {
                  for (h = "INSERT INTO `".concat(l.tableName, "` ("), n = 0; n < e.length; n++) {
                    !l.skipColumn.includes(e[n].originalCellIndex) && this.columns(e[n].originalCellIndex).visible() && (h += "`".concat(e[n].textContent, "`,"));
                  }

                  for (h = h.trim().substring(0, h.length - 1), h += ") VALUES ", n = 0; n < s.length; n++) {
                    for (h += "(", r = 0; r < s[n].cells.length; r++) {
                      !l.skipColumn.includes(e[r].originalCellIndex) && this.columns(e[r].originalCellIndex).visible() && (h += "\"".concat(s[n].cells[r].textContent, "\","));
                    }

                    h = h.trim().substring(0, h.length - 1), h += "),";
                  }

                  h = h.trim().substring(0, h.length - 1), h += ";", l.download && (h = "data:application/sql;charset=utf-8," + h);
                } else if ("json" === l.type) {
                  for (r = 0; r < s.length; r++) {
                    for (a[r] = a[r] || {}, n = 0; n < e.length; n++) {
                      !l.skipColumn.includes(e[n].originalCellIndex) && this.columns(e[n].originalCellIndex).visible() && (a[r][e[n].textContent] = s[r].cells[n].textContent);
                    }
                  }

                  h = JSON.stringify(a, l.replacer, l.space), l.download && (h = "data:application/json;charset=utf-8," + h);
                }

                return l.download && (l.filename = l.filename || "datatable_export", l.filename += "." + l.type, h = encodeURI(h), o = document.createElement("a"), o.href = h, o.download = l.filename, document.body.appendChild(o), o.click(), document.body.removeChild(o)), h;
              }
            }

            return !1;
          }
        }, {
          key: "import",
          value: function _import(t) {
            var e = !1;
            if (!i(t)) return !1;

            var s = _objectSpread({
              lineDelimiter: "\n",
              columnDelimiter: ","
            }, t);

            if (s.data.length || i(s.data)) {
              if ("csv" === s.type) {
                e = {
                  data: []
                };

                var _t13 = s.data.split(s.lineDelimiter);

                _t13.length && (s.headings && (e.headings = _t13[0].split(s.columnDelimiter), _t13.shift()), _t13.forEach(function (t, i) {
                  e.data[i] = [];
                  var a = t.split(s.columnDelimiter);
                  a.length && a.forEach(function (t) {
                    e.data[i].push(t);
                  });
                }));
              } else if ("json" === s.type) {
                var _t14 = function (t) {
                  var e = !1;

                  try {
                    e = JSON.parse(t);
                  } catch (t) {
                    return !1;
                  }

                  return !(null === e || !Array.isArray(e) && !i(e)) && e;
                }(s.data);

                _t14 && (e = {
                  headings: [],
                  data: []
                }, _t14.forEach(function (t, s) {
                  e.data[s] = [], Object.entries(t).forEach(function (_ref6) {
                    var _ref7 = _slicedToArray(_ref6, 2),
                        t = _ref7[0],
                        i = _ref7[1];

                    e.headings.includes(t) || e.headings.push(t), e.data[s].push(i);
                  });
                }));
              }

              i(s.data) && (e = s.data), e && this.insert(e);
            }

            return !1;
          }
        }, {
          key: "print",
          value: function print() {
            var t = this.activeHeadings,
                e = this.activeRows,
                s = a("table"),
                i = a("thead"),
                n = a("tbody"),
                r = a("tr");
            t.forEach(function (t) {
              r.appendChild(a("th", {
                html: t.textContent
              }));
            }), i.appendChild(r), e.forEach(function (t) {
              var e = a("tr");
              Array.from(t.cells).forEach(function (t) {
                e.appendChild(a("td", {
                  html: t.textContent
                }));
              }), n.appendChild(e);
            }), s.appendChild(i), s.appendChild(n);
            var h = window.open();
            h.document.body.appendChild(s), h.print();
          }
        }, {
          key: "setMessage",
          value: function setMessage(t) {
            var e = 1;
            this.hasRows ? e = this.data[0].cells.length : this.activeHeadings.length && (e = this.activeHeadings.length), this.wrapper.classList.add("dataTable-empty"), this.label && (this.label.innerHTML = ""), this.totalPages = 0, this.render("pager"), this.clear(a("tr", {
              html: "<td class=\"dataTables-empty\" colspan=\"".concat(e, "\">").concat(t, "</td>")
            }));
          }
        }, {
          key: "columns",
          value: function columns(t) {
            return new l(this, t);
          }
        }, {
          key: "rows",
          value: function rows(t) {
            return new o(this, t);
          }
        }, {
          key: "on",
          value: function on(t, e) {
            this.events = this.events || {}, this.events[t] = this.events[t] || [], this.events[t].push(e);
          }
        }, {
          key: "off",
          value: function off(t, e) {
            this.events = this.events || {}, t in this.events != 0 && this.events[t].splice(this.events[t].indexOf(e), 1);
          }
        }, {
          key: "emit",
          value: function emit(t) {
            if (this.events = this.events || {}, t in this.events != 0) for (var _e18 = 0; _e18 < this.events[t].length; _e18++) {
              this.events[t][_e18].apply(this, Array.prototype.slice.call(arguments, 1));
            }
          }
        }], [{
          key: "extend",
          value: function extend(t, e) {
            "function" == typeof e ? u.prototype[t] = e : u[t] = e;
          }
        }]);

        return u;
      }();

      s.DataTable = u;
    }, {
      "./date-cd1c23ce.js": 1
    }]
  }, {}, [2])(2);
});