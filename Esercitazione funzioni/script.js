
let number1=5;
let number2=10;


function calcSum(num1,num2) {

    let somma= num1+num2;
    return`la somma calcolata e di: ${somma}`;
    
   //return somma;
    
}
console.log(calcSum(number1,number2));
console.log(calcSum(100,200));
console.log(calcSum(90,91));

//calcSum();



let media=calcSum(5,5)/ 2;
console.log(media);


let simbolo=prompt(`seleziona  l operazione che vuoi effettuare: \n (+)\n (-)`);



function calcolatrice(num1,num2,operation) {

    let result =0;
    if (operation=='+') {
       result=num1+num2 
    }else if (operation== '-') {
        result =num1- num2;
        
    }else if (operation) {
        result=num1*num2;

        
    }else {
        result= 'operazione non consentita'
    }
    return result;
}
console.log(`il risultato ottenuto : ${calcolatrice(2,20,simbolo)}`);
console.log(`il risultato ottenuto : ${calcolatrice(20,20,simbolo)}`);