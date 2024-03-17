const territoryData = JSON.parse(document.querySelector(".content").dataset.territory)
const populationInfoData = JSON.parse(document.querySelector(".content").dataset.populationInfo)

let districtsLabels = [];
let districtsPopulations = [];
let districtsColors = [];
let districtPalletColorIndex = 0;

for (let districtIndex = 0; districtIndex < territoryData.length; districtIndex++) {
    districtsLabels.push(territoryData[districtIndex].name)
    districtsPopulations.push(territoryData[districtIndex].allPopulation)
    districtsColors.push(hexToRGB(districtPallets[districtIndex][0]))

    districtPalletColorIndex++
}

const districtsData = {
    labels: districtsLabels,
    datasets: [{
        label: "Население",
        data: districtsPopulations,
        backgroundColor: districtsColors,
        stack: 'districts',
        borderColor: 'black',
        borderWidth: 1
    }]
};

const barBox = {
    id: 'barBox',
    afterDatasetsDraw(chart, args, pluginOptions) {
        const {ctx, chartArea: {top, bottom}, data, scales: {x, y}} = chart;

        chart.getDatasetMeta(0).data.forEach((metaData, index) => {
            let paths = document.getElementsByClassName("fo-" + index);
            if ("districts" === chart.getDatasetMeta(0).stack) {
                if (true === metaData.active) {
                    for (let path of paths) {
                        path.style.fill = hexToRGB(districtPallets[index][0], 1)
                    }
                } else {
                    for (let path of paths) {
                        path.style.fill = hexToRGB(districtPallets[index][0], 0.1)
                    }
                }
            }
        })
    }
}

const territoryChartConfig = {
    type: 'bar',
    data: districtsData,
    options: {
        plugins: {
            datalabels: {
                formatter: (value, ctx) => {
                    const datapoints = ctx.chart.data.datasets[0].data
                    const total = datapoints.reduce((total, datapoint) => total + datapoint, 0)
                    const percentage = value / total * 100
                    return percentage.toFixed(2) + "%";
                },
                color: '#000000',

                align: 'top',
                anchor: 'end',
                font: {
                    size: 17
                }
            },
            legend: {
                display: false,
                labels: {
                    usePointStyle: true,
                    useBorderRadius: true,
                    borderRadius: 0
                }
            },
            title: {
                display: true,
                text: 'График по федеральным округам, нажмите на колонку ФО чтобы увидеть субъекты ФО'
            }
        },
        onHover: function (event, chartElement) {

            if (1 === chartElement.length && 'districts' === territoryChart.data.datasets[0].stack) {
                event.native.target.style.cursor = 'pointer'
            } else {
                event.native.target.style.cursor = 'default'
            }
        },
        scales: {
            y: {
                beginAtZero: true,
            }
        },

    },
    plugins: [barBox, ChartDataLabels]
};

const ctxStatTerritoryHistogram = document.getElementById('stat-territory-histogramm')

const isHidden = () => ctxStatTerritoryHistogram.classList.contains("box--hidden");

ctxStatTerritoryHistogram.addEventListener("transitionend", function () {
    if (isHidden()) {
        ctxStatTerritoryHistogram.style.display = "none";
    }
});

ctxStatTerritoryHistogram.addEventListener('click', (e) => {
    clickHandler(e)
});

function clickHandler(click) {
    const points = territoryChart.getElementsAtEventForMode(click, 'nearest', {intersect: true}, true);

    if (points.length && 'districts' === territoryChart.data.datasets[0].stack) {
        const firstPoint = points[0];
        let paths = document.getElementsByClassName("fo-" + firstPoint.index);

        for (let path of paths) {
            let rgbValue = path.style.fill.substring(4, path.style.fill.length - 1)
            path.style.fill = 'rgba(' + rgbValue + ', 1)'
        }

        updateStatTerritoryHistogrammToCity(firstPoint);
    }
}

ctxStatTerritoryHistogram.onClick = clickHandler

const territoryChart = new Chart(
    ctxStatTerritoryHistogram,
    territoryChartConfig
);

function updateStatTerritoryHistogrammToCity(firstPoint) {

    let district = territoryData[firstPoint.index]
    let districtSubjects = district.subjects

    let subjectLabels = [];
    let subjectPopulations = [];
    let subjectColors = [];
    let subjectPalletColorIndex = 0;

    subjectPalletColorIndex = 1
    for (let subjectIndex = 0; subjectIndex < districtSubjects.length; subjectIndex++) {
        subjectLabels.push(districtSubjects[subjectIndex].name)
        subjectPopulations.push(districtSubjects[subjectIndex].population)
        subjectColors.push(hexToRGB(districtPallets[firstPoint.index][subjectPalletColorIndex]))
        subjectPalletColorIndex++
    }

    territoryChart.data.datasets[0].data = subjectPopulations
    territoryChart.data.datasets[0].backgroundColor = subjectColors
    territoryChart.data.datasets[0].stack = 'subjects'
    territoryChart.options.plugins.title.text = 'Субъекты, ' + district.name.split(' ')[0] + ' Федеральный округ'
    territoryChart.options.plugins.datalabels.font.size = 10
    territoryChart.data.labels = subjectLabels

    territoryChart.update();
}

let populationOverWorkingAge = populationInfoData.agePopulation.populationOverWorkingAge
let populationUnderWorkingAge = populationInfoData.agePopulation.populationUnderWorkingAge
let workingAge = populationInfoData.agePopulation.workingAge

const agePieConfig = {
    type: 'pie',
    data: {
        labels: ['Младше', 'Трудоспособное', 'Старше'],
        datasets: [{
            data: [populationUnderWorkingAge, workingAge, populationOverWorkingAge],
            backgroundColor: ['LightSteelBlue', 'SteelBlue', 'CadetBlue'],
            borderWidth: 0.5,
            borderColor: 'black'
        }]
    },
    options: {
        aspectRatio: 2,
        plugins: {
            datalabels: {
                formatter: (value, ctx) => {
                    const datapoints = ctx.chart.data.datasets[0].data
                    const total = datapoints.reduce((total, datapoint) => total + datapoint, 0)
                    const percentage = value / total * 100
                    return percentage.toFixed(2) + "%";
                },
                color: '#000000',
                font: {
                    size: 12
                }
            },
            legend: {
                labels: {
                    usePointStyle: true
                },
                position: 'left',
            },
        }
    },
    plugins: [ChartDataLabels]
};

const agePie = new Chart(
    document.getElementById('age-pie-chart').getContext('2d'),
    agePieConfig
)

function testFunc() {
    districtsLabels = [];
     districtsPopulations = [];
     districtsColors = [];
     districtPalletColorIndex = 0;

    for (let districtIndex = 0; districtIndex < territoryData.length; districtIndex++) {
        districtsLabels.push(territoryData[districtIndex].name)
        districtsPopulations.push(territoryData[districtIndex].allPopulation)
        districtsColors.push(hexToRGB(districtPallets[districtIndex][0]))

        districtPalletColorIndex++
    }

    const districtsData = {
        labels: districtsLabels,
        datasets: [{
            label: "Население",
            data: districtsPopulations,
            backgroundColor: districtsColors,
            stack: 'districts',
            borderColor: 'black',
            borderWidth: 1
        }]
    };
    console.log(districtsData)
    territoryChart.data = districtsData
    territoryChart.options.plugins.title.text = 'График по федеральным округам, нажмите на колонку ФО чтобы увидеть субъекты ФО'

    territoryChart.update();
}

let malePopulation = populationInfoData.genderPopulation.malePopulation;
let femalePopulation = populationInfoData.genderPopulation.femalePopulation;

const genderPieConfig = {
    type: 'pie',
    data: {
        labels: ['муж. ' + malePopulation, 'жен. ' + femalePopulation],
        datasets: [{
            data: [malePopulation, femalePopulation],
            backgroundColor: ['lightblue', 'lightpink'],
            borderWidth: 0.5,
            borderColor: 'black'
        }]
    },
    options: {
        aspectRatio: 2,
        plugins: {
            datalabels: {
                formatter: (value, ctx) => {
                    const datapoints = ctx.chart.data.datasets[0].data
                    const total = datapoints.reduce((total, datapoint) => total + datapoint, 0)
                    const percentage = value / total * 100
                    return percentage.toFixed(2) + "%";
                },
                color: '#2a2a2a',
            },
            title: {
                display: true,
                text: 'Популяция РФ, мужчины и женщины'
            },
            legend: {
                title: {
                    display: true,
                    text: ''
                },
                labels: {
                    font: {
                        size: 14
                    },
                    usePointStyle: true
                },
                position: 'left',
            },
        }
    },
    plugins: [ChartDataLabels]
};

const genderPie = new Chart(
    document.getElementById('gender-pie-chart').getContext('2d'),
    genderPieConfig
)

function collapseExpandRegionalOrgansList(clicked, isActive) {
    let regionalOrgansList = null
    let togglerListSvg = null

    if (true === isActive) {
        regionalOrgansList = document.getElementById('regional-organs-active-list')
        togglerListSvg = document.getElementById('toggle-active-list-svg')
    } else {
        regionalOrgansList = document.getElementById('regional-organs-inactive-list')
        togglerListSvg = document.getElementById('toggle-inactive-list-svg')
    }

    if ('none' === regionalOrgansList.style.display) {
        regionalOrgansList.style.display = 'block'
        togglerListSvg.style.rotate = '180deg'
    } else {
        regionalOrgansList.style.display = 'none'
        togglerListSvg.style.rotate = '0deg'
    }
}





