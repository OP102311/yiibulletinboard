$.extend($.easing,
{
    easeIn: function (x, t, b, c, d) {
        return c*(t/=d)*t*t + b;
    },
    easeOut: function (x, t, b, c, d) {
        return c*((t=t/d-1)*t*t + 1) + b;
    }
});
