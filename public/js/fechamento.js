Number.prototype.formatMoney = function(c, d, t){
    var n = this,
        c = isNaN(c = Math.abs(c)) ? 2 : c,
        d = d == undefined ? "." : d,
        t = t == undefined ? "," : t,
        s = n < 0 ? "-" : "",
        i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "",
        j = (j = i.length) > 3 ? j % 3 : 0;
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
};

function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    var dia = today.getDate();
    var mon = today.getMonth();
    var year = today.getFullYear();
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById('txt').innerHTML = dia + "/" + mon + "/" + year + "  " + h + ":" + m + ":" + s;
    var t = setTimeout(startTime, 500);
}

function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}

var inputs = $('input.money-bank');

$('input.money-bank').on('keydown',function(e){
    // tab, esc, enter
    if ($.inArray(e.keyCode, [9, 27, 35, 39, 10]) !== -1 ||
        // Ctrl+A
        (e.keyCode == 65 && e.ctrlKey === true)) {
        return;
    }

    if (e.keyCode == 40 || e.keyCode == 13) {
        e.preventDefault();
        var nextInput = inputs.get(inputs.index(this) + 1);
        if (nextInput) {
            nextInput.focus();
        }
    }

    if (e.keyCode == 38) {
        e.preventDefault();
        var nextInput = inputs.get(inputs.index(this) - 1);
        if (nextInput) {
            nextInput.focus();
        }
    }

    e.preventDefault();

    // backspace & del
    if($.inArray(e.keyCode,[8,46]) !== -1){
        $(this).val('');
        return;
    }

    var a = ["a","b","c","d","e","f","g","h","i","`"];
    var n = ["1","2","3","4","5","6","7","8","9","0"];

    var value = $(this).val();
    var clean = value.replace(/\./g,'').replace(/,/g,'').replace(/^0+/, '');

    var charCode = String.fromCharCode(e.keyCode);
    var p = $.inArray(charCode,a);

    if(p !== -1)
    {
        value = clean + n[p];

        if(value.length == 2) value = '0' + value;
        if(value.length == 1) value = '00' + value;

        var formatted = '';
        for(var i=0;i<value.length;i++)
        {
            var sep = '';
            if(i == 2) sep = ',';
            if(i > 3 && (i+1) % 3 == 0) sep = '.';
            formatted = value.substring(value.length-1-i,value.length-i) + sep + formatted;
        }

        $(this).val(formatted);
    }

    return;

});


function recalculateSum()
{
    var options2 = { style: "currency", currency: "BRL" };

    var cielo_alelo = parseFloat(document.getElementById("cielo_alelo").value.replace(/\./g, '').replace(',', '.')) || 0;
    var cielo_dinners = parseFloat(document.getElementById("cielo_dinners").value.replace(/\./g, '').replace(',', '.')) || 0;
    var cielo_elodeb = parseFloat(document.getElementById("cielo_elodeb").value.replace(/\./g, '').replace(',', '.')) || 0;
    // master
    var getnet1_masterdeb = parseFloat(document.getElementById("getnet1_masterdeb").value.replace(/\./g, '').replace(',', '.')) || 0;
    var getnet2_masterdeb = parseFloat(document.getElementById("getnet2_masterdeb").value.replace(/\./g, '').replace(',', '.')) || 0;
    var getnet3_masterdeb = parseFloat(document.getElementById("getnet3_masterdeb").value.replace(/\./g, '').replace(',', '.')) || 0;
    var getnet4_masterdeb = parseFloat(document.getElementById("getnet4_masterdeb").value.replace(/\./g, '').replace(',', '.')) || 0;
    var getnet1_mastercred = parseFloat(document.getElementById("getnet1_mastercred").value.replace(/\./g, '').replace(',', '.')) || 0;
    var getnet2_mastercred = parseFloat(document.getElementById("getnet2_mastercred").value.replace(/\./g, '').replace(',', '.')) || 0;
    var getnet3_mastercred = parseFloat(document.getElementById("getnet3_mastercred").value.replace(/\./g, '').replace(',', '.')) || 0;
    var getnet4_mastercred = parseFloat(document.getElementById("getnet4_mastercred").value.replace(/\./g, '').replace(',', '.')) || 0;
    // visa
    var getnet1_visadeb = parseFloat(document.getElementById("getnet1_visadeb").value.replace(/\./g, '').replace(',', '.')) || 0;
    var getnet2_visadeb = parseFloat(document.getElementById("getnet2_visadeb").value.replace(/\./g, '').replace(',', '.')) || 0;
    var getnet3_visadeb = parseFloat(document.getElementById("getnet3_visadeb").value.replace(/\./g, '').replace(',', '.')) || 0;
    var getnet4_visadeb = parseFloat(document.getElementById("getnet4_visadeb").value.replace(/\./g, '').replace(',', '.')) || 0;
    var getnet1_visacred = parseFloat(document.getElementById("getnet1_visacred").value.replace(/\./g, '').replace(',', '.')) || 0;
    var getnet2_visacred = parseFloat(document.getElementById("getnet2_visacred").value.replace(/\./g, '').replace(',', '.')) || 0;
    var getnet3_visacred = parseFloat(document.getElementById("getnet3_visacred").value.replace(/\./g, '').replace(',', '.')) || 0;
    var getnet4_visacred = parseFloat(document.getElementById("getnet4_visacred").value.replace(/\./g, '').replace(',', '.')) || 0;
    // Elo
    var getnet1_elodeb = parseFloat(document.getElementById("getnet1_elodeb").value.replace(/\./g, '').replace(',', '.')) || 0;
    var getnet2_elodeb = parseFloat(document.getElementById("getnet2_elodeb").value.replace(/\./g, '').replace(',', '.')) || 0;
    var getnet3_elodeb = parseFloat(document.getElementById("getnet3_elodeb").value.replace(/\./g, '').replace(',', '.')) || 0;
    var getnet4_elodeb = parseFloat(document.getElementById("getnet4_elodeb").value.replace(/\./g, '').replace(',', '.')) || 0;
    var getnet1_elocred = parseFloat(document.getElementById("getnet1_elocred").value.replace(/\./g, '').replace(',', '.')) || 0;
    var getnet2_elocred = parseFloat(document.getElementById("getnet2_elocred").value.replace(/\./g, '').replace(',', '.')) || 0;
    var getnet3_elocred = parseFloat(document.getElementById("getnet3_elocred").value.replace(/\./g, '').replace(',', '.')) || 0;
    var getnet4_elocred = parseFloat(document.getElementById("getnet4_elocred").value.replace(/\./g, '').replace(',', '.')) || 0;
    // sodexo
    var getnet1_sodexo = parseFloat(document.getElementById("getnet1_sodexo").value.replace(/\./g, '').replace(',', '.')) || 0;
    var getnet2_sodexo = parseFloat(document.getElementById("getnet2_sodexo").value.replace(/\./g, '').replace(',', '.')) || 0;
    var getnet3_sodexo = parseFloat(document.getElementById("getnet3_sodexo").value.replace(/\./g, '').replace(',', '.')) || 0;
    var getnet4_sodexo = parseFloat(document.getElementById("getnet4_sodexo").value.replace(/\./g, '').replace(',', '.')) || 0;
    // amex
    var getnet1_amex = parseFloat(document.getElementById("getnet1_amex").value.replace(/\./g, '').replace(',', '.')) || 0;
    var getnet2_amex = parseFloat(document.getElementById("getnet2_amex").value.replace(/\./g, '').replace(',', '.')) || 0;
    var getnet3_amex = parseFloat(document.getElementById("getnet3_amex").value.replace(/\./g, '').replace(',', '.')) || 0;
    var getnet4_amex = parseFloat(document.getElementById("getnet4_amex").value.replace(/\./g, '').replace(',', '.')) || 0;
    // ticket
    var getnet1_ticket = parseFloat(document.getElementById("getnet1_ticket").value.replace(/\./g, '').replace(',', '.')) || 0;
    var getnet2_ticket = parseFloat(document.getElementById("getnet2_ticket").value.replace(/\./g, '').replace(',', '.')) || 0;
    var getnet3_ticket = parseFloat(document.getElementById("getnet3_ticket").value.replace(/\./g, '').replace(',', '.')) || 0;
    var getnet4_ticket = parseFloat(document.getElementById("getnet4_ticket").value.replace(/\./g, '').replace(',', '.')) || 0;


    document.getElementById("getnet_masterdeb").value = (getnet1_masterdeb + getnet2_masterdeb + getnet3_masterdeb + getnet4_masterdeb).toLocaleString("pt-BR", options2);
    document.getElementById("getnet_mastercred").value = (getnet1_mastercred + getnet2_mastercred + getnet3_mastercred + getnet4_mastercred).toLocaleString("pt-BR", options2);
    document.getElementById("getnet_visadeb").value = (getnet1_visadeb + getnet2_visadeb + getnet3_visadeb + getnet4_visadeb).toLocaleString("pt-BR", options2);
    document.getElementById("getnet_visacred").value = (getnet1_visacred + getnet2_visacred + getnet3_visacred + getnet4_visacred).toLocaleString("pt-BR", options2);
    document.getElementById("getnet_elodeb").value = (getnet1_elodeb + getnet2_elodeb + getnet3_elodeb + getnet4_elodeb).toLocaleString("pt-BR", options2);
    document.getElementById("getnet_elocred").value = (getnet1_elocred + getnet2_elocred + getnet3_elocred + getnet4_elocred).toLocaleString("pt-BR", options2);
    document.getElementById("getnet_sodexo").value = (getnet1_sodexo + getnet2_sodexo + getnet3_sodexo + getnet4_sodexo).toLocaleString("pt-BR", options2);
    document.getElementById("getnet_amex").value = (getnet1_amex + getnet2_amex + getnet3_amex + getnet4_amex).toLocaleString("pt-BR", options2);
    document.getElementById("getnet_ticket").value = (getnet1_ticket + getnet2_ticket + getnet3_ticket + getnet4_ticket).toLocaleString("pt-BR", options2);

    var getnet_masterdeb = parseFloat(document.getElementById("getnet_masterdeb").value.substring(2).replace(/\./g, '').replace(',', '.')) || 0;
    var getnet_mastercred = parseFloat(document.getElementById("getnet_mastercred").value.substring(2).replace(/\./g, '').replace(',', '.')) || 0;
    var getnet_visadeb = parseFloat(document.getElementById("getnet_visadeb").value.substring(2).replace(/\./g, '').replace(',', '.')) || 0;
    var getnet_visacred = parseFloat(document.getElementById("getnet_visacred").value.substring(2).replace(/\./g, '').replace(',', '.')) || 0;
    var getnet_elodeb = parseFloat(document.getElementById("getnet_elodeb").value.substring(2).replace(/\./g, '').replace(',', '.')) || 0;
    var getnet_elocred = parseFloat(document.getElementById("getnet_elocred").value.substring(2).replace(/\./g, '').replace(',', '.')) || 0;
    var getnet_ticket = parseFloat(document.getElementById("getnet_ticket").value.substring(2).replace(/\./g, '').replace(',', '.')) || 0;
    var getnet_sodexo = parseFloat(document.getElementById("getnet_sodexo").value.substring(2).replace(/\./g, '').replace(',', '.')) || 0;
    var getnet_amex = parseFloat(document.getElementById("getnet_amex").value.substring(2).replace(/\./g, '').replace(',', '.')) || 0;

    document.getElementById("cielo").value = (cielo_alelo + cielo_dinners + cielo_elodeb).toLocaleString("pt-BR", options2);
    document.getElementById("getnet1").value = (getnet1_masterdeb+getnet1_mastercred+getnet1_visadeb+getnet1_visacred+getnet1_elodeb+getnet1_elocred+getnet1_sodexo+getnet1_amex+getnet1_ticket).toLocaleString("pt-BR", options2);
    document.getElementById("getnet2").value = (getnet2_masterdeb+getnet2_mastercred+getnet2_visadeb+getnet2_visacred+getnet2_elodeb+getnet2_elocred+getnet2_sodexo+getnet2_amex+getnet2_ticket).toLocaleString("pt-BR", options2);
    document.getElementById("getnet3").value = (getnet3_masterdeb+getnet3_mastercred+getnet3_visadeb+getnet3_visacred+getnet3_elodeb+getnet3_elocred+getnet3_sodexo+getnet3_amex+getnet3_ticket).toLocaleString("pt-BR", options2);
    document.getElementById("getnet4").value = (getnet4_masterdeb+getnet4_mastercred+getnet4_visadeb+getnet4_visacred+getnet4_elodeb+getnet4_elocred+getnet4_sodexo+getnet4_amex+getnet4_ticket).toLocaleString("pt-BR", options2);
    document.getElementById("getnet").value = (getnet_masterdeb+getnet_mastercred+getnet_visadeb+getnet_visacred+getnet_elodeb+getnet_elocred+getnet_sodexo+getnet_amex+getnet_ticket).toLocaleString("pt-BR", options2);

    var getnet = parseFloat(document.getElementById("getnet").value.substring(2).replace(/\./g, '').replace(',', '.')) || 0;
    var cielo = parseFloat(document.getElementById("cielo").value.substring(2).replace(/\./g, '').replace(',', '.')) || 0;
    var dinheiro = parseFloat(document.getElementById("dinheiro").value.replace(/\./g, '').replace(',', '.')) || 0;
    var cortesia = parseFloat(document.getElementById("cortesia").value.replace(/\./g, '').replace(',', '.')) || 0;
    document.getElementById("total").innerHTML = (getnet + cielo + dinheiro + cortesia).toLocaleString("pt-BR", options2);

    var nota_100 = parseFloat(document.getElementById("nota_100").value.replace(/\./g, '').replace(',', '.')) || 0;
    var nota_50 = parseFloat(document.getElementById("nota_50").value.replace(/\./g, '').replace(',', '.')) || 0;
    var nota_20 = parseFloat(document.getElementById("nota_20").value.replace(/\./g, '').replace(',', '.')) || 0;
    var nota_10 = parseFloat(document.getElementById("nota_10").value.replace(/\./g, '').replace(',', '.')) || 0;
    var nota_5 = parseFloat(document.getElementById("nota_5").value.replace(/\./g, '').replace(',', '.')) || 0;
    var nota_2 = parseFloat(document.getElementById("nota_2").value.replace(/\./g, '').replace(',', '.')) || 0;
    var nota_1 = parseFloat(document.getElementById("nota_1").value.replace(/\./g, '').replace(',', '.')) || 0;
    var nota_050 = parseFloat(document.getElementById("nota_050").value.replace(/\./g, '').replace(',', '.')) || 0;
    var nota_025 = parseFloat(document.getElementById("nota_025").value.replace(/\./g, '').replace(',', '.')) || 0;
    var nota_010 = parseFloat(document.getElementById("nota_010").value.replace(/\./g, '').replace(',', '.')) || 0;
    var nota_005 = parseFloat(document.getElementById("nota_005").value.replace(/\./g, '').replace(',', '.')) || 0;


    document.getElementById("total_100").value = (nota_100 * 100).toLocaleString("pt-BR", options2);
    document.getElementById("total_50").value = (nota_50 * 50).toLocaleString("pt-BR", options2);
    document.getElementById("total_20").value = (nota_20 * 20).toLocaleString("pt-BR", options2);
    document.getElementById("total_10").value = (nota_10 * 10).toLocaleString("pt-BR", options2);
    document.getElementById("total_5").value = (nota_5 * 5).toLocaleString("pt-BR", options2);
    document.getElementById("total_2").value = (nota_2 * 2).toLocaleString("pt-BR", options2);
    document.getElementById("total_1").value = (nota_1 * 1).toLocaleString("pt-BR", options2);
    document.getElementById("total_050").value = (nota_050 * 0.5).toLocaleString("pt-BR", options2);
    document.getElementById("total_025").value = (nota_025 * 0.25).toLocaleString("pt-BR", options2);
    document.getElementById("total_010").value = (nota_010 * 0.10).toLocaleString("pt-BR", options2);
    document.getElementById("total_005").value = (nota_005 * 0.05).toLocaleString("pt-BR", options2);

    var total_100 = parseFloat(document.getElementById("total_100").value.substring(2).replace(/\./g, '').replace(',', '.')) || 0;
    var total_50 = parseFloat(document.getElementById("total_50").value.substring(2).replace(/\./g, '').replace(',', '.')) || 0;
    var total_20 = parseFloat(document.getElementById("total_20").value.substring(2).replace(/\./g, '').replace(',', '.')) || 0;
    var total_10 = parseFloat(document.getElementById("total_10").value.substring(2).replace(/\./g, '').replace(',', '.')) || 0;
    var total_5 = parseFloat(document.getElementById("total_5").value.substring(2).replace(/\./g, '').replace(',', '.')) || 0;
    var total_2 = parseFloat(document.getElementById("total_2").value.substring(2).replace(/\./g, '').replace(',', '.')) || 0;
    var total_1 = parseFloat(document.getElementById("total_1").value.substring(2).replace(/\./g, '').replace(',', '.')) || 0;
    var total_050 = parseFloat(document.getElementById("total_050").value.substring(2).replace(/\./g, '').replace(',', '.')) || 0;
    var total_025 = parseFloat(document.getElementById("total_025").value.substring(2).replace(/\./g, '').replace(',', '.')) || 0;
    var total_010 = parseFloat(document.getElementById("total_010").value.substring(2).replace(/\./g, '').replace(',', '.')) || 0;
    var total_005 = parseFloat(document.getElementById("total_005").value.substring(2).replace(/\./g, '').replace(',', '.')) || 0;

    document.getElementById("dinheiro_contado").value = (total_100+total_50+total_20+total_10+total_5+total_2+total_1+total_050+total_025+total_010+total_005).toLocaleString("pt-BR", options2);

    var ctrl_f = "<table class='table table-sm'>";

    var elodeb = getnet_elodeb+cielo_elodeb;

    if (cielo_alelo > 0 ) { ctrl_f = ctrl_f + "<tr><td>ALELO</td><td>" + cielo_alelo.toLocaleString("pt-BR", options2).substring(2) + "</td></tr>"; }
    if (getnet_amex > 0 ) { ctrl_f = ctrl_f + "<tr><td>AMERICAN EXPRESS</th><th>" + getnet_amex.toLocaleString("pt-BR", options2).substring(2) + "</td></tr>"; }
    if (cortesia > 0 ) { ctrl_f = ctrl_f + "<tr><td>CORTESIA</th><th>" + cortesia.toLocaleString("pt-BR", options2).substring(2) + "</td></tr>"; }
    if (dinheiro > 0 ) { ctrl_f = ctrl_f + "<tr><td>DINHEIRO</th><th>" + dinheiro.toLocaleString("pt-BR", options2).substring(2) + "</td></tr>"; }
    if (cielo_dinners > 0 ) { ctrl_f = ctrl_f + "<tr><td>DINNERS</th><th>" + cielo_dinners.toLocaleString("pt-BR", options2).substring(2) + "</td></tr>"; }
    if (getnet_elocred > 0 ) { ctrl_f = ctrl_f + "<tr><td>ELO CRÉDITO</th><th>" + getnet_elocred.toLocaleString("pt-BR", options2).substring(2) + "</td></tr>"; }
    if (elodeb > 0 ) { ctrl_f = ctrl_f + "<tr><td>ELO DÉBITO</th><th>" + elodeb.toLocaleString("pt-BR", options2).substring(2) + "</td></tr>"; }
    if (getnet_masterdeb > 0 ) { ctrl_f = ctrl_f + "<tr><td>MAESTRO</th><th>" + getnet_masterdeb.toLocaleString("pt-BR", options2).substring(2) + "</td></tr>"; }
    if (getnet_mastercred > 0 ) { ctrl_f = ctrl_f + "<tr><td>MASTERCARD</th><th>" + getnet_mastercred.toLocaleString("pt-BR", options2).substring(2) + "</td></tr>"; }
    if (getnet_sodexo > 0 ) { ctrl_f = ctrl_f + "<tr><td>SODEXO</th><th>" + getnet_sodexo.toLocaleString("pt-BR", options2).substring(2) + "</td></tr>"; }
    if (getnet_ticket > 0 ) { ctrl_f = ctrl_f + "<tr><td>TICKET RESTAURANTE</th><th>" + getnet_ticket.toLocaleString("pt-BR", options2).substring(2) + "</td></tr>"; }
    if (getnet_visacred > 0 ) { ctrl_f = ctrl_f + "<tr><td>VISA CRÉDITO</th><th>" + getnet_visacred.toLocaleString("pt-BR", options2).substring(2) + "</td></tr>"; }
    if (getnet_visadeb > 0 ) { ctrl_f = ctrl_f + "<tr><td>VISA ELECTRON</th><th>" + getnet_visadeb.toLocaleString("pt-BR", options2).substring(2) + "</td></tr>"; }

    var total_tudo = document.getElementById("total").innerHTML.substring(2);
    var total_tudo2 = document.getElementById("total").innerHTML.substring(2).replace(/\./g, '').replace(',', '.') || 0;

    if (total_tudo2 > 0 ) { ctrl_f = ctrl_f + "<tr><td>TOTAL</th><th>" + total_tudo + "</td></tr></table> <div class='right-align'><a class='btn btn-large btn-success' href='#'><i class='fa fa-check-square-o' aria-hidden='true'></i> CONFERIDO !! </a></div>"; }

    document.getElementById("div_f").innerHTML = ctrl_f;

    $("table_f").html(ctrl_f);
}

function recalculateSum2()
{
    var options2 = { style: "currency", currency: "BRL" };
    var dinheiro_contado = parseFloat(document.getElementById("dinheiro_contado").value.substring(2).replace(/\./g, '').replace(',', '.')) || 0;
    var troco = parseFloat(document.getElementById("troco").value.replace(/\./g, '').replace(',', '.')) || 0;
    var gastos = parseFloat(document.getElementById("gastos").value.replace(/\./g, '').replace(',', '.')) || 0;
    var dinheiro = parseFloat(document.getElementById("dinheiro").value.replace(/\./g, '').replace(',', '.')) || 0;

    var conferencia = ((dinheiro_contado+gastos)-(troco+dinheiro));

    var conf = document.getElementById("trconf");

    if(conferencia < 0){
        conf.className = "danger";
    }
    else {
        conf.className = "success";
    }
    if(conferencia == 0){ conf.className = "active"; }

    document.getElementById("div_troco").innerHTML =  troco.toLocaleString("pt-BR", options2);
    document.getElementById("div_vendas").innerHTML =  dinheiro.toLocaleString("pt-BR", options2);
    document.getElementById("div_gastos").innerHTML =  gastos.toLocaleString("pt-BR", options2);
    document.getElementById("div_conf").innerHTML =  conferencia.toLocaleString("pt-BR", options2);
    document.getElementById("div_dinheiro_contado").innerHTML =  dinheiro_contado.toLocaleString("pt-BR", options2);

}

startTime();