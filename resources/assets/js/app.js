require('./bootstrap');

var width = 500,
    height = 500;

var svg = d3.select("#map").append("svg")
    .attr("width", width)
    .attr("height", height);

d3.json("js/hrv.json", function(error, uk) {
    if (error) return console.error(error);
    var projection = d3.geoMercator()
        .center([16.4, 44.7])
        .scale(4500)
        .translate([width / 2, height / 2]);
    var path = d3.geoPath()
        .projection(projection);

    svg.append("path")
        .datum(topojson.feature(uk, uk.objects.subunits))
        .attr("class", "hrvatska")
        .attr("d", path);
});