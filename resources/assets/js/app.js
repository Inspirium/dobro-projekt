var d3 = require('d3');
var topojson = require('topojson');

var width = 500,
    height = 500;

var svg = d3.select("#map").append("svg")
    .attr("width", width)
    .attr("height", height)
    .call(d3.zoom().on("zoom", function () {
        svg.attr("transform", d3.event.transform)
    }))
    .append("g");

var projection = d3.geoMercator()
    .center([16.4, 44.7])
    .scale(4500)
    .translate([width / 2, height / 2]);
var path = d3.geoPath()
    .projection(projection);

d3.json("js/hrv.json", function(error, uk) {
    if (error) return console.error(error);

    svg.append("path")
        .datum(topojson.feature(uk, uk.objects.subunits))
        .attr("class", "hrvatska")
        .attr("d", path)
        .on('click', function(d) {console.log(path.bounds(d))});
});