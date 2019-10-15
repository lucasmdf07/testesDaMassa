
function lettersSCalc(weight) {

  var result;

  if(weight <= 1){
    return result = 0.49;
  }
  else if (weight <= 2) {
    return result = 0.70;
  }
  else if (weight <= 3) {
    return result = 0.91;
  }
  else if (weight <= 3.5) {
    return result = 1.12;
  }
  else {
    return result = -1;
  }
}

function lettersMCalc(weight) {

  var result;

  if(weight <= 1){
    return result = 0.46;
  }
  else if (weight <= 2) {
    return result = 0.67;
  }
  else if (weight <= 3) {
    return result = 0.88;
  }
  else if (weight <= 3.5) {
    return result = 1.09;
  }
  else {
    return result = -1;
  }

}

function envelopesCalc(weight) {

  var result;

  if(weight <= 1){
    return result = 0.98;
  }
  else if (weight <= 2) {
    return result = 1.19;
  }
  else if (weight <= 3) {
    return result = 1.40;
  }
  else if (weight <= 4) {
    return result = 1.61;
  }
  else if (weight <= 5) {
    return result = 1.82;
  }
  else if (weight <= 6) {
    return result = 2.03;
  }
  else if (weight <= 7) {
    return result = 2.24;
  }
  else if (weight <= 8) {
    return result = 2.45;
  }
  else if (weight <= 9) {
    return result = 2.66;
  }
  else if (weight <= 10) {
    return result = 2.87;
  }
  else if (weight <= 11) {
    return result = 3.08;
  }
  else if (weight <= 12) {
    return result = 3.29;
  }
  else if (weight <= 13) {
    return result = 3.50;
  }
  else {
    return result = -1;
  }
}

function parcelsCalc(weight) {

    var result;

    if(weight <= 4){
      return result = 2.67;
    }
    else if (weight <= 5) {
      return result = 2.85;
    }
    else if (weight <= 6) {
      return result = 3.03;
    }
    else if (weight <= 7) {
      return result = 3.21;
    }
    else if (weight <= 8) {
      return result = 3.39;
    }
    else if (weight <= 9) {
      return result = 3.57;
    }
    else if (weight <= 10) {
      return result = 3.75;
    }
    else if (weight <= 11) {
      return result = 3.93;
    }
    else if (weight <= 12) {
      return result = 4.11;
    }
    else if (weight <= 13) {
      return result = 4.29;
    }
    else {
      return result = -1;
    }
}
