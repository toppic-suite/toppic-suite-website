(function parseRegisterInfo() {
    //read each line and split by "\t"
    //get the last element in the resulting array
    //split by - and get the year
    //increment count for each year
    //after the values array is filled, feed into the visSpec

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
    if(xmlhttp.status == 200 && xmlhttp.readyState == 4){
        let downloadData = {};
        let finalData = [];
        let registerInfo = xmlhttp.responseText;
        const regex = /\d{4}-\d{2}-\d{2}/g;
        let dateInfo = registerInfo.match(regex);
        dateInfo.forEach((date) => {
            let year = date.split("-")[0];
            if (year in downloadData) {
                downloadData[year] = downloadData[year] + 1;
            }
            else {
                downloadData[year] = 0;
            }
        })
        let years = Object.keys(downloadData);
        for (let i = 1; i < years.length; i++) {
            finalData.push({a: years[i], b: downloadData[years[i]]});
        }

        var yourVlSpec = {
            $schema: 'https://vega.github.io/schema/vega-lite/v5.json',
            description: 'A simple bar chart with embedded data.',
            width:250,
            height:300,
            title:"Number of Downloads Per Year",
            data: {
              values: finalData
            },
            layer: [{
                mark: 'bar',
                mark: {
                    type: "text",
                    align: "left",
                    baseline: "middle",
                    dx: 3
                  },
                  encoding: {
                    text: {field: "b", type: "quantitative"}
                  }
            }],
            encoding: {
              x: {field: 'a', type: 'ordinal', "title": "Year", "axis": {"labelAngle":-45}},
              y: {field: 'b', type: 'quantitative', "title": "Number of Downloads"}
            }
          };
        vegaEmbed('#download-graph-div', yourVlSpec, {"actions": false});
    }
    };
    xmlhttp.open("GET","register_info.txt",true);
    xmlhttp.send();

})();

