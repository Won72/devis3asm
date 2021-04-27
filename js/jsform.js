$(document).ready(function () {
  //Metier - Bilan/Suivi
  //Si psy neu / else edu sop nat

  changeSelectValues();

  $("#devis_metier").change(function () {
    changeSelectValues();
  });

  function changeSelectValues() {
    var selectOption = $("#devis_metier option:selected");
    var checkOptionDevis = selectOption.data("bilan");
    console.log(checkOptionDevis);
    if (checkOptionDevis == "isBilan") {
      $(".div_programme_bilan").show();
    } else {
      $(".div_programme_bilan").hide();
      $("#suivi").attr("checked", true);
      changeRadioValues();
    }
  }

  //Frequence
  const divFrequence = $(".div_frequence");
  $("input[name=programme]").change(function () {
    changeRadioValues();
  });

  function changeRadioValues() {
    var inputValue = $("input[name=programme]:checked").val();
    //console.log(inputValue);
    if (inputValue == "suivi") {
      divFrequence.show();
    } else {
      divFrequence.hide();
    }

    if ($("#suivi").is(":checked")) {
      $("#40f1a").prop("required", true);
    } else {
      $("#40f1a").prop("required", false);
    }
  }
});

//information detail Frequence
const divFrequenceDetail = $(".div_form_seance_box");
$("input[name=frequence]").change(function () {
  changeFrequenceValues();
});

function changeFrequenceValues() {
  var inputValue = $("input[name=frequence]:checked").val();
  if (inputValue) {
    divFrequenceDetail.show();
  } else {
    divFrequenceDetail.hide();
  }

  //value p
  var freqSem = $("input[name=frequence]:checked").data("semaine");
  var freqMois = $("input[name=frequence]:checked").data("mois");

  $(".span_form_seance1").text(freqSem);
  $(".span_form_seance2").text(freqMois);
}
