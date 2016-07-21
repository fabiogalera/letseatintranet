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

    var a = ["a","b","c","d","e","f","g","h","i","`","1","2","3","4","5","6","7","8","9","0"];
    var n = ["1","2","3","4","5","6","7","8","9","0","1","2","3","4","5","6","7","8","9","0"];

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

// Declaracao Master
var options2 = { style: "currency", currency: "BRL" };

var TotalMaquina = {"getnet1": 0, "getnet2": 0, "getnet3": 0,"getnet4": 0, "cielo": 0, "dinheiro": 0, "cortesia": 0};
var TotalBand = {"masterdeb": 0, "mastercred": 0, "visadeb": 0, "visacred": 0, "elodeb": 0, "elocred": 0, "amex": 0, "sodexo": 0, "ticket": 0, "alelo": 0, "dinners": 0};
var TotalGetNet = 0;
var TotalVendas = 0;
var TotalCielo = 0;

function CalculaTotal () {
    TotalVendas = 0;
    TotalGetNet = 0;

    $("[id$=_total]").each(function(){
        var valor = parseFloat($(this).val().substring(2).replace(/\./g, '').replace(',', '.')) || 0;
        TotalGetNet = TotalGetNet + valor;
        });

    $("#getnet").val(parseFloat(TotalGetNet).toLocaleString("pt-BR", options2));
    $('#cielo').val(parseFloat(TotalCielo).toLocaleString("pt-BR", options2));

    TotalBand.dinheiro = parseFloat($('#dinheiro').val().replace(/\./g, '').replace(',', '.')) || 0;
    TotalBand.cortesia = parseFloat($('#cortesia').val().replace(/\./g, '').replace(',', '.')) || 0;

    TotalVendas = TotalGetNet + TotalCielo + TotalBand.dinheiro + TotalBand.cortesia;

    $("#total").html(parseFloat(TotalVendas).toLocaleString("pt-BR", options2));

    Conferencia();
}

function SomarTotalCielo ()
{
    TotalCielo = 0;
    TotalBand.alelo = parseFloat($("#alelo").val().replace(/\./g, '').replace(',', '.')) || 0;
    TotalBand.dinners = parseFloat($("#dinners").val().replace(/\./g, '').replace(',', '.')) || 0;
    TotalCielo = TotalBand.alelo + TotalBand.dinners;
    CalculaTotal();
}

function SomarTotal (arg,A)
{
    arg = arg.split("_");
    maquina = arg[0];
    band = arg[1];

    TotalMaquina[maquina] = 0;
    TotalBand[band] = 0;

    $("[id^="+ maquina +"_]").each(function(){
        var valor = parseFloat($(this).val().replace(/\./g, '').replace(',', '.')) || 0;
        TotalMaquina[maquina] = parseFloat(TotalMaquina[maquina]) + valor;
    });

    $("[id$=_"+ band +"]").each(function(){
        var valor = parseFloat($(this).val().replace(/\./g, '').replace(',', '.')) || 0;
        TotalBand[band] = parseFloat(TotalBand[band]) + valor;
    });

    // Set os valores nos campos
    $('#'+maquina).val(parseFloat(TotalMaquina[maquina]).toLocaleString("pt-BR", options2));
    $('#'+band+'_total').val(parseFloat(TotalBand[band]).toLocaleString("pt-BR", options2));

    CalculaTotal();
}


function Conferencia ()
{
    var ctrl_f = "<table class='table table-sm'>";

    if (TotalBand.alelo > 0 ) { ctrl_f = ctrl_f + "<tr><td>ALELO</td><td>" + TotalBand.alelo.toLocaleString("pt-BR", options2).substring(2) + "</td></tr>"; }
    if (TotalBand.amex > 0 ) { ctrl_f = ctrl_f + "<tr><td>AMERICAN EXPRESS</th><th>" + TotalBand.amex.toLocaleString("pt-BR", options2).substring(2) + "</td></tr>"; }
    if (TotalBand.cortesia > 0 ) { ctrl_f = ctrl_f + "<tr><td>CORTESIA</th><th>" + TotalBand.cortesia.toLocaleString("pt-BR", options2).substring(2) + "</td></tr>"; }
    if (TotalBand.dinheiro > 0 ) { ctrl_f = ctrl_f + "<tr><td>DINHEIRO</th><th>" + TotalBand.dinheiro.toLocaleString("pt-BR", options2).substring(2) + "</td></tr>"; }
    if (TotalBand.dinners > 0 ) { ctrl_f = ctrl_f + "<tr><td>DINNERS</th><th>" + TotalBand.dinners.toLocaleString("pt-BR", options2).substring(2) + "</td></tr>"; }
    if (TotalBand.elocred > 0 ) { ctrl_f = ctrl_f + "<tr><td>ELO CRÉDITO</th><th>" + TotalBand.elocred.toLocaleString("pt-BR", options2).substring(2) + "</td></tr>"; }
    if (TotalBand.elodeb > 0 ) { ctrl_f = ctrl_f + "<tr><td>ELO DÉBITO</th><th>" + TotalBand.elodeb.toLocaleString("pt-BR", options2).substring(2) + "</td></tr>"; }
    if (TotalBand.masterdeb > 0 ) { ctrl_f = ctrl_f + "<tr><td>MAESTRO</th><th>" + TotalBand.masterdeb.toLocaleString("pt-BR", options2).substring(2) + "</td></tr>"; }
    if (TotalBand.mastercred > 0 ) { ctrl_f = ctrl_f + "<tr><td>MASTERCARD</th><th>" + TotalBand.mastercred.toLocaleString("pt-BR", options2).substring(2) + "</td></tr>"; }
    if (TotalBand.sodexo > 0 ) { ctrl_f = ctrl_f + "<tr><td>SODEXO</th><th>" + TotalBand.sodexo.toLocaleString("pt-BR", options2).substring(2) + "</td></tr>"; }
    if (TotalBand.ticket > 0 ) { ctrl_f = ctrl_f + "<tr><td>TICKET RESTAURANTE</th><th>" + TotalBand.ticket.toLocaleString("pt-BR", options2).substring(2) + "</td></tr>"; }
    if (TotalBand.visacred > 0 ) { ctrl_f = ctrl_f + "<tr><td>VISA CRÉDITO</th><th>" + TotalBand.visacred.toLocaleString("pt-BR", options2).substring(2) + "</td></tr>"; }
    if (TotalBand.visadeb > 0 ) { ctrl_f = ctrl_f + "<tr><td>VISA ELECTRON</th><th>" + TotalBand.visadeb.toLocaleString("pt-BR", options2).substring(2) + "</td></tr>"; }

    if (TotalVendas > 0 ) { ctrl_f = ctrl_f + "<tr><td>TOTAL</th><th><b>" + parseFloat(TotalVendas).toLocaleString("pt-BR", options2).substring(2) + "</b></td></tr></table> <div class='right-align'><a class='btn btn-large btn-success' href='#'><i class='fa fa-check-square-o' aria-hidden='true'></i> CONFERIDO !! </a></div>"; }

    document.getElementById("div_f").innerHTML = ctrl_f;

    $("table_f").html(ctrl_f);

    var dinheiro_contado = parseFloat(document.getElementById("dinheiro_contado").value.substring(2).replace(/\./g, '').replace(',', '.')) || 0;
    var troco = parseFloat(document.getElementById("troco").value.replace(/\./g, '').replace(',', '.')) || 0;
    var gastos = parseFloat(document.getElementById("gastos").value.replace(/\./g, '').replace(',', '.')) || 0;

    var conferencia = ((dinheiro_contado+gastos)-(troco+TotalBand.dinheiro));

    var conf = document.getElementById("trconf");

    if(conferencia < 0){
        conf.className = "danger";
    }
    else {
        conf.className = "success";
    }

    if(conferencia == 0){ conf.className = "active"; }

    document.getElementById("div_troco").innerHTML =  troco.toLocaleString("pt-BR", options2);
    document.getElementById("div_vendas").innerHTML =  TotalBand.dinheiro.toLocaleString("pt-BR", options2);
    document.getElementById("div_gastos").innerHTML =  gastos.toLocaleString("pt-BR", options2);
    document.getElementById("div_conf").innerHTML =  conferencia.toLocaleString("pt-BR", options2);
    document.getElementById("div_dinheiro_contado").innerHTML =  dinheiro_contado.toLocaleString("pt-BR", options2);

}

function CalculaDinheiro()
{
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

}

function recalculateSum2()
{


}

startTime();