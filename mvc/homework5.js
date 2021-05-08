//Написать функцию, возведения числа N в степень M
function pownumber(number = 2 , pow = 32){
    if( pow > 0 )
    {
        let newNumber = 1;
        do {
            newNumber *= number;
            --pow;
        } while (pow > 0);
        return newNumber;
    }else if (pow < 0 ){
        let newNumber = 1;
        do {
            newNumber /= number;
            pow++;
        }while (pow < 0);
        return newNumber;
    }else if (pow == 0){
        let newNumber = 1;
    }
}


//Написать функцию которая по параметрам принимает число из десятичной системы счисления и преобразовывает в двоичную.

function toBinary(decimal_num, divider=4294967296){
    result = decimal_num/divider;
    if(result >= 1 && divider >= 1){
        document.write(1);
        decimal_num %= divider;
        divider /= 2 ;
        positiveBinary(decimal_num ,divider);
    } else if(result < 1 && divider >= 1){
        document.write(0);
        divider /= 2;
        positiveBinary(decimal_num ,divider);
    }
}

//Написать функцию которая выполняет преобразование наоборот.
function decimal(binary_num){
    binary_num = String(binary_num);
    document.write(binary_num);
    binary_num = binary_num.split("");
    binary_num = binary_num.reverse();
    let decimal = 0;
    let pow = 0;
    binary_num.forEach(binary => {
        decimal += binary*Math.pow(2, pow);
        pow++;
    })
    return decimal;
}

//Написать функцию которая выводит первые N чисел фибоначчи
function fibonachi(count){
    let arrayOfFibonachi = [];
    for (let i=0 ; i < count ; i++){
        if (i == 0) {
            arrayOfFibonachi.push(0);
        }else if (i == 1) {
            arrayOfFibonachi.push(1);
        }else if(i < count){
            arrayOfFibonachi.push (arrayOfFibonachi[i-1] + arrayOfFibonachi[i-2]);
        }
    }
    arrayOfFibonachi.forEach(number => {
        document.write(number + ' ');
    })
}


//Написать функцию которая вычисляет входит ли IP-адрес в диапазон указанных IP-адресов. Вычислить для версии ipv4.
let startIpv4 = "80.80.80.80";
let ipv4 = "92.150.240.79";
let finishIpv4 = "100.100.100.100";

function addZero(value)
{
    return value.padStart(3, "0");
}

function rangeEntryIpv4(ipv4){
    let arrayIpv4 = [];
    let startIpv4 = "80.80.80.80";
    let finishIpv4 = "100.100.100.100";
    arrayIpv4.push(startIpv4.split("."));
    arrayIpv4.push(ipv4.split("."));
    arrayIpv4.push(finishIpv4.split("."));

    let result = [];
    for(let i = 0; i < arrayIpv4.length; i++){
        arrayIpv4[i] = arrayIpv4[i].map(addZero);
        result.push(arrayIpv4[i].join(''));
    }
    if(result[0] < result[1] && result[1]< result[2]){
        document.write(' Ipv4 is in range ');
    }else {
        document.write(' Ipv4 is out of range ');
    }
}



//Для одномерного массива. Подсчитать процентное соотношение положительных/отрицательных/нулевых/простых чисел
function calculateThePercentageOfNumbers(array){
    let count    = array.length;
    let arrayForNull =[];
    let arrayForPositiveNumbers =[];
    let arrayForNegativeNumbers =[];
    let arrayForSimple =[];

    array.forEach(number => {
        if(number == 0){
            arrayForNull.push(number);
        } else if (number > 0){
            arrayForPositiveNumbers.push(number);
            let countNumbers = 0;
            for (i=1; i < number+1; i++) {
                num = number / i;
                if(Number(num)) countNumbers +=1;
            }
            if(countNumbers<3 && countNumbers>1){
                arrayForSimple.push(number);
            }
        } else if (number < 0){
            arrayForNegativeNumbers.push(number);
        }
    });
    document.write("Count zeros in array : "+((arrayForNull.length/count)*100)+" % <br/>");
    document.write("Count positive numbers in array : "+((arrayForPositiveNumbers.length/count)*100)+" % <br/>");
    document.write("Count negative numbers in array: "+((arrayForNegativeNumbers.length/count)*100)+" % <br/>");
    document.write("Count simple numbers in array: "+((arrayForSimple.length/count)*100)+" % <br/>");
}


//Отсортировать элементы по возрастанию
function sortToMaxValue(array){
    let newArray = [];
    for(let i = 0; i < array.length; i++){
        let minValue = Math.min(...array);
        newArray.push(minValue);
        let index = array.indexOf(minValue);
        array.splice(index , 1 , 0);
    }
    return newArray;
}

//Отсортировать элементы по убыванию
function sortToMinValue(array){
    let newArray = [];
    for(let i = 0; i < array.length; i++){
        let maxValue = Math.max(...array);
        newArray.push(maxValue);
        let index = array.indexOf(maxValue);
        array.splice(index , 1 , 0);
    }
    return newArray;
}





//Транспонировать матрицу
let Matrix = [
    [1, 6, 11],
    [2, 7, 12],
    [3, 8, 13],
    [4, 9, 14],
    [5, 10,15],
];

function transpondMatrix(Matrix){
    let arrayMatrix = Matrix
    let count = arrayMatrix.length;
    let countRow = arrayMatrix[0].length;
    let newMatrix = [];
    for (let r=0; r < countRow; r++) {
        let rowInMatrix = [];
        for (let c=0; c < count; c++) {
            rowInMatrix.push(Number(arrayMatrix[c][r]));
        }
        newMatrix.push(rowInMatrix);
    }
    return newMatrix;
}



//Умножить две матрицы

let firstArrayMatrix = [
    [1, 1, 1, 1, 1],
    [6, 0, 0, 0, 0],
    [-16, 0, 0, 5, 0]
];

let secondArrayMatrix = [
    [1, 1, 1, 1, 1],
    [6, 0, 0, 0, 0],
    [-16, 0, 0, 5, 0],
    [6, 0, 5, 0, 0],
    [-16, 0, 0, 5, 0]
];


function matrixMultiplication(firtsMatrix , secondMatrix){
    let count = firtsMatrix.length;
    let countRow = firtsMatrix[0].length;
    let countCol = secondMatrix[0].length;
    let newMatrix = [];
    for (row=0; row < count; row++) {
        for (column=0; column < countCol; column++) {
            newMatrix[row] = [];
            for (secondRow=0; secondRow < countRow; secondRow++) {
                newMatrix[row].push(firtsMatrix[row][secondRow]*secondMatrix[secondRow][column]);
            }
        }
    }
    return newMatrix;
}


//Удалить те строки, в которых сумма элементов положительна и присутствует хотя бы один нулевой элемент. Аналогично для столбцов.

function delateZerosAndPositiveValues(matrix) {

    let newMatrix = [];
    let rowCount = matrix.length;
    for (let row = 0; row < rowCount; row++) {
        let columnCount = matrix[row].length;
        let index = 0;
        let issetZero = false;
        for (let cols = 0; cols < columnCount; cols++) {
            index += matrix[row][cols];
            if (matrix[row][cols] == 0) {
                issetZero = true;
            }
        }
        if (!(index > 0 && issetZero)) {
            newMatrix.push(matrix[row]);
        }
    }
    return newMatrix;
}


let recursiveArray = [
    [5, 6],
    [9,[7, 8], 9],
    [5, 6],
    8,
    [5, 6],
];

//Написать рекурсивную функцию которая будет обходить и выводить все значения любого массива и любого уровня вложенности
function recursiv(array){
        array.forEach(element => {
            if(Array.isArray(element)){
                recursiv(element);
            } else {
                document.write(element)
            }
        })
}


function pownumber(number = 2 , pow = 3){
    if( pow == 1) {
        return number;
    }else{
        return number *= pownumber(number , pow-1);
    }
}