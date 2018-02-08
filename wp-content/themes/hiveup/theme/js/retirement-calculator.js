function showResult() {
    var currentAge = parseInt(document.getElementById('current-age').value);
    var countryOfRetirement = document.getElementById('location').value;
    var retirementAge = parseInt(document.getElementById('retirement-age').value);
    var retirementIncome = parseFloat(document.getElementById('retirement-income').value);

    var avgSgrLifeExpentancy = 83.1; // 2017 WHO
    var inflationRates = {
        Singapore: 0.35,
        Australia: 1.90,
        Canada: 1.87,
        China: 1.80,
        France: 1.19,
        Germany: 1.65,
        HongKong: 1.73,
        India: 0.75,
        Indonesia: 0.00,
        Japan: 1.10,
        Korea: 1.42,
        Malaysia: 3.42,
        NewZeland: 0.00,
        Philippines: 5.22,
        Spain: 0.00,
        Taiwan: 1.20,
        Thailand: 0.78,
        UnitedKingdom: 1.47,
        UnitedStates: 2.11
    }; //Q4 2017
    var avgMonthlyRetireeExpenditure = {
        Singapore: 50830.08,    //SGD
        Australia: 43695.00,    //AUD
        Canada: 40000.00,       //CAD
        China: 111660.96,       //RMB (offshore)
        France: 29164.20,       //USD
        Germany: 20352.24,      //EUR
        HongKong: 292720.32,    //HKD
        India: 7392.12,         //USD
        Indonesia: 12370.44,    //USD
        Japan: 2888623,         //JPY
        Korea: 174598.44,       //HKD
        Malaysia: 13112.28,     //USD
        NewZeland: 37054.68,    //NZD
        Philippines: 11558.76,  //USD
        Spain: 21701.64,        //USD
        Taiwan: 10433.80,       //USD
        Thailand: 12779.76,     //EUR
        UnitedKingdom: 29713.00,//GBP
        UnitedStates:30096.00   //USD
    }; //Q4 2017

    var totalIncomeDuringRetirement = retirementIncome*(avgSgrLifeExpentancy - retirementAge)*12;
    var totalExpenditureDuringRetirement = FutureValue(avgMonthlyRetireeExpenditure[countryOfRetirement],inflationRates[countryOfRetirement],(avgSgrLifeExpentancy - retirementAge)*12);
    var shortfall = totalExpenditureDuringRetirement - totalIncomeDuringRetirement;

    document.getElementById('total-income-during-retirement').textContent = totalIncomeDuringRetirement;
    document.getElementById('total-expenditure-during-retirement').textContent = totalExpenditureDuringRetirement;
    document.getElementById('shortfall').textContent = shortfall;

}

function FutureValue(presentValue, interestRate, numberOfPeriods) {
    var interestAppreciation = (1 + interestRate/100)
    var futureValue = presentValue * (Math.pow(interestAppreciation, numberOfPeriods))
    return futureValue;
}
