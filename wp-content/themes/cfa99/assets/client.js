(function(jQuery) {
    jQuery(document).on('click','.code',function(){
        console.log('aaa')
        var data=jQuery(this).find('.code_stocks').text();
        jQuery('.showstocks').click();
        setTimeout(function(){
            new FireAnt.QuoteWidget({
                "container_id": "fan-quote-520",
                "symbols": data,
                "locale": "vi",
                "price_line_color": "#71BDDF",
                "grid_color": "#999999",
                "label_color": "#999999",
                "width": "100%",
                "height": "300px"
            });
        
        },1000);
    } )
    jQuery(document).on('click','.item-code-btn', async function(){
        var code = jQuery(this).attr('data-code');
        await getInfoCommon(code)
        console.log(code)
        codeStock = code
        // jQuery('#sidebar-chart iframe').attr('src','https://info.sbsi.vn/chart/?symbol='+code+'&language=vi&theme=light');
        
    });
   

})(jQuery);

	
var COLOR_PURPLE = "#B64FF5",
    COLOR_YELLOW = "#FEC703",
    COLOR_BLUE_ACCESS = "#48C1CC",
    COLOR_GREEN = "#60B523",
    COLOR_RED = "#E63124"
var RESULT_PRICE = {}
async function callApi(endPoint, method, isToken = true, body, isJson = false) {

    var myHeaders = new Headers();
    var requestOptions = {
        method: method,
        redirect: 'follow',

    };
    if (isToken) {
        myHeaders.append("Authorization", "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsIng1dCI6IkdYdExONzViZlZQakdvNERWdjV4QkRITHpnSSIsImtpZCI6IkdYdExONzViZlZQakdvNERWdjV4QkRITHpnSSJ9.eyJpc3MiOiJodHRwczovL2FjY291bnRzLmZpcmVhbnQudm4iLCJhdWQiOiJodHRwczovL2FjY291bnRzLmZpcmVhbnQudm4vcmVzb3VyY2VzIiwiZXhwIjoxODg5NjIyNTMwLCJuYmYiOjE1ODk2MjI1MzAsImNsaWVudF9pZCI6ImZpcmVhbnQudHJhZGVzdGF0aW9uIiwic2NvcGUiOlsiYWNhZGVteS1yZWFkIiwiYWNhZGVteS13cml0ZSIsImFjY291bnRzLXJlYWQiLCJhY2NvdW50cy13cml0ZSIsImJsb2ctcmVhZCIsImNvbXBhbmllcy1yZWFkIiwiZmluYW5jZS1yZWFkIiwiaW5kaXZpZHVhbHMtcmVhZCIsImludmVzdG9wZWRpYS1yZWFkIiwib3JkZXJzLXJlYWQiLCJvcmRlcnMtd3JpdGUiLCJwb3N0cy1yZWFkIiwicG9zdHMtd3JpdGUiLCJzZWFyY2giLCJzeW1ib2xzLXJlYWQiLCJ1c2VyLWRhdGEtcmVhZCIsInVzZXItZGF0YS13cml0ZSIsInVzZXJzLXJlYWQiXSwianRpIjoiMjYxYTZhYWQ2MTQ5Njk1ZmJiYzcwODM5MjM0Njc1NWQifQ.dA5-HVzWv-BRfEiAd24uNBiBxASO-PAyWeWESovZm_hj4aXMAZA1-bWNZeXt88dqogo18AwpDQ-h6gefLPdZSFrG5umC1dVWaeYvUnGm62g4XS29fj6p01dhKNNqrsu5KrhnhdnKYVv9VdmbmqDfWR8wDgglk5cJFqalzq6dJWJInFQEPmUs9BW_Zs8tQDn-i5r4tYq2U8vCdqptXoM7YgPllXaPVDeccC9QNu2Xlp9WUvoROzoQXg25lFub1IYkTrM66gJ6t9fJRZToewCt495WNEOQFa_rwLCZ1QwzvL0iYkONHS_jZ0BOhBCdW9dWSawD6iF1SIQaFROvMDH1rg");
        requestOptions.headers = myHeaders

    }
    if (isJson) {
        myHeaders.append('Content-Type', 'application/json')
        requestOptions.headers = myHeaders
    }
    if (body) requestOptions.body = JSON.stringify(body)

    return fetch(endPoint, requestOptions)
        .then(response => response.text())
        .then(result => JSON.parse(result))
        .catch(error => console.log('error', error));
    // return response
}

function formatnumber(number, fixed = 2) {
    if (isNaN(number) || !number) return 0
    number = number.toFixed(fixed)
    return new Intl.NumberFormat().format(number)
}
async function getHistories() {
    var endpoint = 'https://trading.greenstock.vn/data/api/realtime/intradayticker'
    var resultHistories = await callApi(endpoint, "POST", false, {
        'ticker': codeStock
    }, true)
    resultHistories = resultHistories.data;
    var html = "";
    var dataChart = [];
    for (let i = 0; i < resultHistories.length; i++) {
        if (i > 500) break;
        let item = resultHistories[i]
        html += "<tr>" +
            "<td>" + item.time + "</td>" +
            "<td><b style='color: " + checkDisplayColor(item.price) + "'>" + item.price + "</b></td>" +
            "<td>" + formatnumber(item?.volume) + "</td>" +
            "</tr>"
        if (i > 10) continue
    }

    jQuery('#historiesPrice').html(html)
}
async function getInfoCommon(codeStock) {
    console.log(codeStock);
    var fundalmental = "https://restv2.fireant.vn/symbols/" + codeStock + "/fundamental"
    var priceUrl = "https://price.vfs.com.vn/rest/market/api/getQuotesBySecCode?secCode=" + codeStock
    var resultFundalmental = await callApi(fundalmental, "GET", true)
    var resultPrice = await callApi(priceUrl, "GET", false)
    resultPrice = resultPrice.data
    RESULT_PRICE = resultPrice
    var dataTable = [{
            'color': checkDisplayColor(resultPrice?.basicPrice),
            'value': formatnumber(resultPrice?.basicPrice),
            'alias': 'Tham chiếu'
        },
        {
            'color': checkDisplayColor(resultPrice?.openPrice),
            'value': formatnumber(resultPrice?.openPrice),
            'alias': 'Mở cửa'
        },
        {
            'color': '',
            'isSpecial': true,
            'value': '<div class="pr-1 text-right"><span style="color:' + checkDisplayColor(resultPrice?.lowestPrice) + '">' + formatnumber(resultPrice?.lowestPrice) +
                '</span> - <span style="color:' + checkDisplayColor(resultPrice?.highestPrice) + '">' + formatnumber(resultPrice?.highestPrice) + '</span></div>',
            'alias': 'Thấp - cao'
        },
        {
            'color': '',
            'value': formatnumber(resultPrice?.totalQty),
            'alias': 'Khối Lượng'
        },
        {
            'color': '',
            'value': formatnumber(resultPrice?.totalAmt ? resultPrice?.totalAmt / 1000000 : 0) + ' tỷ',
            'alias': 'Giá trị'
        },
        {
            'color': '',
            'value': formatnumber(resultFundalmental?.avgVolume10d),
            'alias': 'KLTB 10 ngày'
        },
        {
            'color': '',
            'value': formatnumber(resultFundalmental?.beta),
            'alias': 'Beta'
        },
        {
            'color': '',
            'value': formatnumber(resultFundalmental?.marketCap ? resultFundalmental.marketCap / 1000000000 : 0) + " tỷ",
            'alias': 'Thị giá vốn'
        },
        {
            'color': '',
            'value': formatnumber(resultFundalmental?.sharesOutstanding),
            'alias': 'Số lượng CPLH'
        },
        {
            'color': '',
            'value': formatnumber(resultFundalmental?.pe),
            'alias': 'P/E'
        },
        {
            'color': '',
            'value': formatnumber(resultFundalmental?.eps, 0),
            'alias': 'EPS'
        },
    ]
    var html = '<table class="table table-striped">';

    dataTable.map(e => {
        var th = () => {
            if (e?.isSpecial) return '<th>' + e?.value + '</th>'
            return '<th> <div class="text-right pr-1" style=" color:' + e?.color + '">' + e?.value + '</div></th>'
        }
        html += '<tr>' +
            '<td style="width:75%"> <div class="pl-1">' +
            e.alias +
            '</td>' + th() +
            '</tr>'
    })
    html += "</table>"
    jQuery('#nav-home').html(html)
    // dùng trường best1BidPriceStr , best1OfferPriceStr để check màu sắc và hiển thị giá mua bán dòng đầu, nếu = ATO || ATC thì màu đen,
    var dataSell = [{
            'label': 'bestOffer',
            'price': resultPrice?.best1OfferPriceStr,
            'qty': resultPrice?.best1OfferQty,
            'color': checkDisplayColor(resultPrice?.best1OfferPrice),
            'bgColor': '',
        },
        {
            'label': 'bestOffer',
            'price': resultPrice?.best2OfferPrice,
            'qty': resultPrice?.best2OfferQty,
            'color': checkDisplayColor(resultPrice?.best2OfferPrice),
            'bgColor': ''
        },
        {
            'label': 'bestOffer',
            'price': resultPrice?.best3OfferPrice,
            'qty': resultPrice?.best3OfferQty,
            'color': checkDisplayColor(resultPrice?.best3OfferPrice),
            'bgColor': ''
        }
    ]
    var dataBuy = [{
            'label': 'bestOffer',
            'price': resultPrice?.best1BidPriceStr,
            'qty': resultPrice?.best1BidQty,
            'color': checkDisplayColor(resultPrice?.best1BidPrice),
            'bgColor': '',
        },
        {
            'label': 'bestOffer',
            'price': resultPrice?.best2BidPrice,
            'qty': resultPrice?.best2BidQty,
            'color': checkDisplayColor(resultPrice?.best2BidPrice),
            'bgColor': '',
        },
        {
            'label': 'bestOffer',
            'price': resultPrice?.best3BidPrice,
            'qty': resultPrice?.best3BidQty,
            'color': checkDisplayColor(resultPrice?.best3BidPrice),
            'bgColor': '',
        }
    ]

    let htmlSell = '';
    let maxWidthSell = total(dataSell)
    dataSell.map(e => {
        htmlSell += '<div class="sc-lgpMPf bthUPl"><div class="sc-hECAmk bCzOtC" style="padding-left: 4px; font-weight: bold;"><span style="padding: 4px; color: rgb(0, 170, 0);">' + e.price + '&nbsp;</span></div><div class="sc-ldxQMJ dacVUY" style="justify-content: flex-end;"><span style="padding: 4px;">' + formatnumber(e.qty) + '&nbsp;</span></div><div style="position: absolute; z-index: 0; top: 0px; bottom: 0px; left: 2px; width:' + ((e.qty / maxWidthSell) * 100) + '%; background-color:' + checkDisplayColor(e.price) + ';opacity:0.5"></div></div>'
    })
    let htmlBuy = '';
    let maxWidthBuy = total(dataBuy)
    dataBuy.map(e => {
        htmlBuy += '<div class="sc-lgpMPf bthUPl"><div class="sc-ldxQMJ dacVUY"><span style="padding: 4px;">&nbsp;' + formatnumber(e.qty) + '</span></div><div class="sc-hECAmk bCzOtC" style="justify-content: flex-end;padding-right: 4px;font-weight: bold;"><span style="padding: 4px; color: ' + e.color + ';">&nbsp;' + e.price + '</span></div><div style="position: absolute;z-index: 0;top: 0px;bottom: 0px;right: 2px;width: ' + ((e.qty / maxWidthBuy) * 100) + '%;background-color: ' + checkDisplayColor(e.price) + ';opacity:0.5"></div></div>'
    })

    jQuery('#totalQty').text(formatnumber(resultPrice.totalQty))
    jQuery('#widgetSellStock').html(htmlSell)
    jQuery('#widgetBuyStock').html(htmlBuy)

}

function checkDisplayColor(price = 0) {
    return checkColor(price, RESULT_PRICE?.ceilingPrice, RESULT_PRICE?.floorPrice, RESULT_PRICE?.basicPrice);
}
jQuery(document).ready(async function() {
    await getInfoCommon()
})

function total(array) {
    var total = 0;
    array.map(e => {
        total += e.qty
    })
    return total
}

async function chartPrice() {
    var endpoint = " https://trading.greenstock.vn/data/api/realtime/intradaytickerbyprice"
    var resultChart = await callApi(endpoint, "POST", false, {
        ticker: codeStock
    }, true)
    resultChart = resultChart.data
    var dataChart = []
    resultChart.map(item => {
        dataChart.push({
            y: item.volume / 1000,
            label: formatnumber(item?.price),
            indexLabel: formatnumber(item?.price),
            color: checkDisplayColor(item?.price)
        });
    })
    //Better to construct options first and then pass it as a parameter
    var options = {
        animationEnabled: true,
        backgroundColor: "#f4f6f9",
        height: 700,
        axisY: {
            tickThickness: 1,
            lineThickness: 1,
            includeZero: true,
            gridThickness: 1,
            gridColor: "#bbb",
            gridDashType: "dash",
        },
        axisX: {
            gridDashType: "dash",
            gridColor: "#bbb",
            tickThickness: 1,
            includeZero: true,
            lineThickness: 1,
            labelFontSize: 15,
            labelFontColor: "#000"
        },
        toolTip: {
            borderColor: "#000000c7",
            backgroundColor: "#000000c7",
            fontColor: "#fff"
        },
        data: [{
            indexLabelFontSize: 10,
            toolTipContent: "<span>Mức giá :{indexLabel}</span> <br> <span>Tổng KL: <strong>{y}</strong></span>",
            indexLabelPlacement: "",
            indexLabelFontColor: "#ffffff00",
            indexLabelFontWeight: 100,
            type: "bar",
            dataPoints: dataChart
        }]
    };

    jQuery("#chartContainer").CanvasJSChart(options);
}
async function statistical() {
    var currentDate = new Date()

    var startDate = subtractMonths(new Date(), 1)
    var endPoint = "https://restv2.fireant.vn/symbols/" + codeStock + "/historical-quotes?startDate=" + formatDate(startDate) + "&endDate=" + formatDate(currentDate) + "&offset=0&limit=10"
    var result = await callApi(endPoint, "GET", true, null, false)
    var dataChart = [],
        htmlVolume = '',
        htmlPrice = '';
    const totalColor = (total) => {
        if (total == 0) return "#000";
        if (total > 0) return COLOR_GREEN;
        if (total < 0) return COLOR_RED;
    }

    for (let i = 0; i < result.length; i++) {
        let item = result[i]

        if (i === 0) {
            console.log(item?.buyForeignQuantity);
            htmlVolume += "<tr>" +
                "<td> <b class='pl-2' style='color:" + COLOR_GREEN + "'>" + formatnumber(item?.buyForeignQuantity) + "<b></td>" +
                "<td> <b class='pl-2' style='color:" + COLOR_RED + "'>" + formatnumber(item?.sellForeignQuantity) + "</b></td>" +
                "<td> <b class='pl-2' style='color:" + (totalColor(item?.buyForeignQuantity - item?.sellForeignQuantity)) + "'>" +
                (formatnumber(item?.buyForeignQuantity - item?.sellForeignQuantity)) +
                " </b></td></tr>";

            htmlPrice += "<tr>" +
                "<td> <b class='pl-2' style='color:" + COLOR_GREEN + "'>" + formatnumber(item?.buyForeignValue / 1000000000) + " tỷ </b></td>" +
                "<td> <b class='pl-2' style='color:" + COLOR_RED + "'>" + formatnumber(item?.sellForeignValue / 1000000000) + " tỷ</b></td>" +
                "<td> <b class='pl-2' style='color:" + (totalColor(item?.buyForeignValue - item?.sellForeignValue)) + "'>" +
                ((formatnumber((item?.buyForeignValue - item?.sellForeignValue) / 1000000000))) +
                " tỷ</b></td></tr>"
        }
        let date = new Date(item.date)
        var dataY = (item?.buyForeignValue - item?.sellForeignValue) / 1000000000
        dataChart.push({
            label: (item?.buyForeignValue - item?.sellForeignValue) ? formatMoth(date) : '  ',
            y: Number.parseFloat(dataY.toFixed(2)),
            color: totalColor(item?.buyForeignValue - item?.sellForeignValue)
        }, )

    }

    var options = {
        backgroundColor: "#f4f6f9",
        axisY: {
            tickThickness: -1,
            lineThickness: 0,
            includeZero: true,
            gridThickness: 1,
            gridColor: "#bbb",
            gridDashType: "dash",
        },
        toolTip: {
            content: "<span>Ngày mua: {label} </span><br><span> Giá trị mua dòng: {y}</span>",
            borderColor: "#000000c7",
            backgroundColor: "#000000c7",
            fontColor: "#fff"
        },

        data: [{
            // Change type to "doughnut", "line", "splineArea", etc.
            type: "column",
            dataPoints: dataChart.reverse()
        }]
    };
    jQuery('#htmlVolume').html(htmlVolume)
    jQuery('#htmlPrice').html(htmlPrice)
    jQuery("#chart-statistical").CanvasJSChart(options);
}

function subtractMonths(date, months) {
    date.setMonth(date.getMonth() - months);

    return date;
}

function formatDate(date = new Date()) {
    const year = date.toLocaleString('default', {
        year: 'numeric'
    });
    const month = date.toLocaleString('default', {
        month: '2-digit'
    });
    const day = date.toLocaleString('default', {
        day: '2-digit'
    });

    return [year, month, day].join('-');
}

function formatMoth(date = new Date()) {
    const month = date.toLocaleString('default', {
        month: '2-digit'
    });
    const day = date.toLocaleString('default', {
        day: '2-digit'
    });

    return [day, month].join('/');
}

function checkColor(lastPrice = 0, ceilingPrice = 0, floorPrice = 0, basicPrice = 0) {
    if (lastPrice >= ceilingPrice /*Nếu: LAST_PRICE >= giá trần thì hiển thị màu tím*/ ) return COLOR_PURPLE;
    if (lastPrice <= floorPrice /*Nếu: LAST_PRICE <= giá sàn => màu xanh da trời*/ ) return COLOR_BLUE_ACCESS;
    if (lastPrice == basicPrice /*Nếu: LAST_PRICE = giá tham chiếu => màu vàng*/ ) return COLOR_YELLOW;
    if (basicPrice < lastPrice && lastPrice < ceilingPrice /*Nếu: giá tham chiếu <  LAST_PRICE < giá trần => màu xanh lá cây*/ ) return COLOR_GREEN;
    if (floorPrice < lastPrice && lastPrice < basicPrice /*Nếu: giá sàn < LAST_PRICE < giá tham chiếu => màu đỏ*/ ) return COLOR_RED;
    return COLOR_PURPLE;
}
jQuery(document).ready(function() {
    var ulNewsWrapperWidth = jQuery(".news-wrapper .inner ul").width();
    var marqueeWidth = ulNewsWrapperWidth + 1000;

        var secondNewsWrapper = parseInt((marqueeWidth - 1000) / 30) + 's';
        jQuery(".news-wrapper .inner ul").css({
            'animation': 'n-carousel ' + secondNewsWrapper + ' linear infinite',
            '-webkit-animation': 'n-carousel ' + secondNewsWrapper + ' linear infinite'
        });
        jQuery.keyframe.define([{
            name: 'n-carousel',
            '100%': {
                '-webkit-transform': "translate3d(-" + marqueeWidth + "px,0,0)",
                'transform': "translate3d(-" + marqueeWidth + "px,0,0)"
            }
        }]);
    
    jQuery(".news-wrapper .inner ul").mouseover(function() {
        jQuery(this).css({
            '-webkit-animation-play-state': 'paused',
            'animation-play-state': 'paused'
        });
    });
    jQuery(".news-wrapper .inner ul").hover(function() {
        jQuery(this).css({
            '-webkit-animation-play-state': 'running',
            'animation-play-state': 'running'
        });
    });
    console.log(1111)
});