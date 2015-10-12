jQuery(document).ready(function($) {
  
  $("#calculateCropPopulation").bind('click submit', function() {
    calculateCropPopulation(this.form);
    return false;
  });

  $("#calculateCropPopulationHoop").bind('click submit', function() {
    calculateCropPopulationHoop(this.form);
    return false;
  });

  $("#calculateWheatHarvestYieldLoss").bind('click submit', function() {
    calculateWheatHarvestYieldLoss(this.form);
    return false;
  });

  $("#calculateSorghumHarvestYieldLoss").bind('click submit', function() {
    calculateSorghumHarvestYieldLoss(this.form);
    return false;
  });

  $("#calculateSoybeanHarvestYieldLoss").bind('click submit', function() {
    calculateSoybeanHarvestYieldLoss(this.form);
    return false;
  });

  $("#calculateSunflowerHarvestYieldLoss").bind('click submit', function() {
    calculateSunflowerHarvestYieldLoss(this.form);
    return false;
  });

  function isValid(entry, a, b) {
    if (isNaN(entry.value) || (entry.value==null) || (entry.value=="")) {
      entry.focus();
      entry.select();
      return false;
    }
    return true;
  }

  function roundHundred(x) {
    return Math.round(x/100)*100;
  }

  function roundTenth(x) {
    return Math.round(x*10)/10;
  }

  function roundHundredth(x) {
    return Math.round(x*100)/100;
  }
  
  function calculateCropPopulation(form) {
    if (!isValid(form.stand_count, 0, 1000)) {  
      return false;
    } else if (!isValid(form.row_length, 0, 1000)) {  
      return false;
    } else if (!isValid(form.row_spacing, 0, 1000)) {  
      return false;
    } 
    var stand_count = form.stand_count.value;
    var row_length = form.row_length.value;
    var row_spacing = form.row_spacing.value;
    var acre_sq_feet = 43560;
    var population = 0;
    population = stand_count/(row_spacing/12*row_length/acre_sq_feet);
    form.crop_population.value = roundHundred(population);
  }

  function calculateCropPopulationHoop(form) {
    if (!isValid(form.stand_count, 0, 1000)) {  
      return false;
    } else if (!isValid(form.hoop_size, 0, 1000)) {  
      return false;
    }
    var stand_count = form.stand_count.value;
    var hoop_size = form.hoop_size.value;
    var acre_sq_feet = 43560;
    var pi = 3.14159265358979;
    var base_pow = (hoop_size/12)/2;
    var population = 0;
    population = stand_count/(3.14159265358979*(Math.pow(base_pow,2))/acre_sq_feet);
    form.crop_population.value = roundHundred(population);
  }

  function calculateWheatHarvestYieldLoss(form) {
    if (!isValid(form.kernels_count, 0, 1000)) {  
      return false;
    } else if (!isValid(form.kernels_area, 0, 1000)) {  
      return false;
    }
    var kernels_count = form.kernels_count.value;
    var kernels_area = form.kernels_area.value;
    var yield_loss = 0;
    yield_loss = kernels_count/kernels_area/20;
    form.yield_loss.value = roundTenth(yield_loss);
  }

  function calculateSorghumHarvestYieldLoss(form) {
    if (!isValid(form.kernels_count, 0, 1000)) {  
      return false;
    } else if (!isValid(form.kernels_area, 0, 1000)) {  
      return false;
    }
    var kernels_count = form.kernels_count.value;
    var kernels_area = form.kernels_area.value;
    var yield_loss = 0;
    yield_loss = kernels_count/kernels_area/18.5;
    form.yield_loss.value = roundTenth(yield_loss);
  }

  function calculateSoybeanHarvestYieldLoss(form) {
    if (!isValid(form.beans_count, 0, 1000)) {  
      return false;
    } else if (!isValid(form.beans_area, 0, 1000)) {  
      return false;
    }
    var beans_count = form.beans_count.value;
    var beans_area = form.beans_area.value;
    var yield_loss = 0;
    yield_loss = beans_count/beans_area/4;
    form.yield_loss.value = roundTenth(yield_loss);
  }

  function calculateSunflowerHarvestYieldLoss(form) {
    if (!isValid(form.seeds_count, 0, 1000)) {  
      return false;
    } else if (!isValid(form.seeds_area, 0, 1000)) {  
      return false;
    }
    var seeds_count = form.seeds_count.value;
    var seeds_area = form.seeds_area.value;
    var yield_loss = 0;
    yield_loss = seeds_count/seeds_area/10*100;
    form.yield_loss.value = roundTenth(yield_loss);
  }
  

});



