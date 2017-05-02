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

    var dots = 0;
    lands = topojson.feature(uk, uk.objects.subunits);
    for (var i0 = 0; i0 < lands.features[0].geometry.coordinates.length; i0++) {

        p = lands.features[0].geometry.coordinates[i0];

        feature = {type: "Feature", geometry: {type: "Polygon", coordinates: p}}
        var bounds = path.bounds(feature);
        var sample = poissonDiscSampler(bounds[1][0] - bounds[0][0], bounds[1][1] - bounds[0][1], 2 * 2);
        s = true;
        while (s) {
            var s = sample();
            if (s) {
                x = bounds[0][0] + s[0];
                y = bounds[0][1] + s[1];

                if (pointInPolygon(projection.invert([x, y]), p[0])) {
                    //TODO: place marker
                    svg.append("circle")
                        .attr('cx', x)
                        .attr('cy', y)
                        .attr('r', 2)
                        .attr('fill', '#b00');
                    dots++
                }
            }
        }
    }
    console.log(dots);

});

// PNPOLY
function pointInPolygon(point, polygon) {
    for (var n = polygon.length, i = 0, j = n - 1, x = point[0], y = point[1], inside = false; i < n; j = i++) {
        var xi = polygon[i][0], yi = polygon[i][1],
            xj = polygon[j][0], yj = polygon[j][1];
        if ((yi > y ^ yj > y) && (x < (xj - xi) * (y - yi) / (yj - yi) + xi)) inside = !inside;
    }
    return inside;
}

// Based on https://www.jasondavies.com/poisson-disc/
function poissonDiscSampler(width, height, radius) {
    var k = 30, // maximum number of samples before rejection
        radius2 = radius * radius,
        R = 3 * radius2,
        cellSize = radius * Math.SQRT1_2,
        gridWidth = Math.ceil(width / cellSize),
        gridHeight = Math.ceil(height / cellSize),
        grid = new Array(gridWidth * gridHeight),
        queue = [],
        queueSize = 0,
        sampleSize = 0;

    return function() {
        if (!sampleSize) return sample(Math.random() * width, Math.random() * height);

        // Pick a random existing sample and remove it from the queue.
        while (queueSize) {
            var i = Math.random() * queueSize | 0,
                s = queue[i];

            // Make a new candidate between [radius, 2 * radius] from the existing sample.
            for (var j = 0; j < k; ++j) {
                var a = 2 * Math.PI * Math.random(),
                    r = Math.sqrt(Math.random() * R + radius2),
                    x = s[0] + r * Math.cos(a),
                    y = s[1] + r * Math.sin(a);

                // Reject candidates that are outside the allowed extent,
                // or closer than 2 * radius to any existing sample.
                if (0 <= x && x < width && 0 <= y && y < height && far(x, y)) return sample(x, y);
            }

            queue[i] = queue[--queueSize];
            queue.length = queueSize;
        }
    };

    function far(x, y) {
        var i = x / cellSize | 0,
            j = y / cellSize | 0,
            i0 = Math.max(i - 2, 0),
            j0 = Math.max(j - 2, 0),
            i1 = Math.min(i + 3, gridWidth),
            j1 = Math.min(j + 3, gridHeight);

        for (j = j0; j < j1; ++j) {
            var o = j * gridWidth;
            for (i = i0; i < i1; ++i) {
                if (s = grid[o + i]) {
                    var s,
                        dx = s[0] - x,
                        dy = s[1] - y;
                    if (dx * dx + dy * dy < radius2) return false;
                }
            }
        }

        return true;
    }

    function sample(x, y) {
        var s = [x, y];
        queue.push(s);
        grid[gridWidth * (y / cellSize | 0) + (x / cellSize | 0)] = s;
        ++sampleSize;
        ++queueSize;
        return s;
    }
}