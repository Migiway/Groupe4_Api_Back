$(function () {
  "use strict";
  $('#vmap').vectorMap({
    map: 'world_en',
    backgroundColor: null,
    color: '#7E80E7',
    hoverOpacity: 0.7,
    selectedColor: '#666666',
    enableZoom: true,
    showTooltip: true,
    // values: sample_data,
    scaleColors: ['#C8EEFF', '#006491'],
    normalizeFunction: 'polynomial'});
  $('#vmap-1').vectorMap({
    map: 'usa_en',
    backgroundColor: null,
    color: '#7E80E7',
    enableZoom: true,
    showTooltip: true,
    selectedColor: null,
    hoverColor: '#5a5bb7' ,
    colors: {
        mo: '#71BFF1',
        fl: '#FFC646',
        or: '#fe7572'
    },
    onRegionClick: function(event, code, region){
        event.preventDefault();
    }
  });
  $('#vmap-2').vectorMap({
      map: 'europe_en',
      backgroundColor: null,
      color: '#7E80E7',
      hoverColor: '#5a5bb7',
      enableZoom: false,
      showTooltip: false
  });
  $('#vmap-3').vectorMap({
      map: 'germany_en',
      backgroundColor: null,
      color: '#7E80E7',
      hoverColor: '#5a5bb7'
    });
  $('#vmap-4').vectorMap({
      map: 'canada_en',
      backgroundColor: null,
      color: '#7E80E7',
      hoverColor: '#5a5bb7'
    });

});
