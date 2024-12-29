
/*function for amount convert into english words */

var iWords = [' zero', ' one', ' two', ' three', ' four', ' five', ' six', ' seven', ' eight', ' nine'];
var ePlace = [' ten', ' eleven', ' twelve', ' thirteen', ' fourteen', ' fifteen', ' sixteen', ' seventeen',
    ' eighteen', ' nineteen'
];
var tensPlace = ['', ' ten', ' twenty', ' thirty', ' forty', ' fifty', ' sixty', ' seventy', ' eighty', ' ninety'];
var inWords = [];

var numReversed, inWords, actnumber, i, j;

function tensComplication() {
    if (actnumber[i] == 0) {
        inWords[j] = '';
    } else if (actnumber[i] == 1) {
        inWords[j] = ePlace[actnumber[i - 1]];
    } else {
        inWords[j] = tensPlace[actnumber[i]];
    }
}

function convertAmount(numericValue = 1200) {

    // var numericValue = document.getElementById('total').value;
    numericValue = numericValue.toString().replace(/[,]/g, '');
    numericValue = parseFloat(numericValue).toFixed(2);
    var amount = numericValue.toString().split('.');
    var taka = amount[0];
    var paisa = amount[1];
    // document.getElementById('container').value = convert(taka) + " Rupees and" + convert(paisa) + " paisa only";

    var en = convert(taka) + " Rupees and" + convert(paisa) + " paisa only";
    // console.log(en);
    return wwords(en)
}

function convert(numericValue) {
    inWords = []
    if (numericValue == "00" || numericValue == "0") {
        return ' zero';
    }
    var obStr = numericValue.toString();
    numReversed = obStr.split('');
    actnumber = numReversed.reverse();

    if (Number(numericValue) == 0) {
        document.getElementById('container').value = 'TOTAL Zero';
        return false;
    }

    var iWordsLength = numReversed.length;
    var finalWord = '';
    j = 0;
    for (i = 0; i < iWordsLength; i++) {
        switch (i) {
            case 0:
                if (actnumber[i] == '0' || actnumber[i + 1] == '1') {
                    inWords[j] = '';
                } else {
                    inWords[j] = iWords[actnumber[i]];
                }
                inWords[j] = inWords[j] + '';
                break;
            case 1:
                tensComplication();
                break;
            case 2:
                if (actnumber[i] == '0') {
                    inWords[j] = '';
                } else if (actnumber[i - 1] !== '0' && actnumber[i - 2] !== '0') {
                    inWords[j] = iWords[actnumber[i]] + ' hundred';
                } else {
                    inWords[j] = iWords[actnumber[i]] + ' hundred';
                }
                break;
            case 3:
                if (actnumber[i] == '0' || actnumber[i + 1] == '1') {
                    inWords[j] = '';
                } else {
                    inWords[j] = iWords[actnumber[i]];
                }
                if (actnumber[i + 1] !== '0' || actnumber[i] > '0') {
                    inWords[j] = inWords[j] + ' thousand';
                }
                break;
            case 4:
                tensComplication();
                break;
            case 5:
                if (actnumber[i] == '0' || actnumber[i + 1] == '1') {
                    inWords[j] = '';
                } else {
                    inWords[j] = iWords[actnumber[i]];
                }
                if (actnumber[i + 1] !== '0' || actnumber[i] > '0') {
                    inWords[j] = inWords[j] + ' lakh';
                }
                break;
            case 6:
                tensComplication();
                break;
            case 7:
                if (actnumber[i] == '0' || actnumber[i + 1] == '1') {
                    inWords[j] = '';
                } else {
                    inWords[j] = iWords[actnumber[i]];
                }
                inWords[j] = inWords[j] + ' crore';
                break;
            case 8:
                tensComplication();
                break;
            default:
                break;
        }
        j++;
    }


    inWords.reverse();
    for (i = 0; i < inWords.length; i++) {
        finalWord += inWords[i];
    }
    return finalWord;
}

function wwords(finalWords = "") {
    var str, str1, str2, str3, q, q1, p, st;
    var result = '';
    var ws = new Array();
    var ws1 = '';
    var result2 = '';

    // whiout point
    // var finalWords = document.getElementById('container').value;
    finalWords = finalWords.trim();
    var res1 = finalWords.match(" Rupees and zero");
    if (res1 == " Rupees and zero") {
        var completestring = finalWords.replace('Rupees and zero paisa only', '');
        /* Function for text transform capitalize */
        var pieces = completestring.split(" ");
        for (var i = 0; i < pieces.length; i++) {
            var j = pieces[i].charAt(0).toUpperCase();
            pieces[i] = j + pieces[i].substr(1);
        }
        var string = pieces.join(" ");

        // document.getElementById('container3').value = string;
    } else {

        // else for number in point

        var res2 = finalWords.replace("Rupees and", "Point");

        var res3 = res2.replace(" paisa only", " ");

        var splitword = res3.split(" Point ");

        var words2;
        for (var z = 0; z < splitword.length; z++) {
            var words1 = splitword[1];
            words2 = splitword[0];
        }

        var spword = words1.split(" ");

        /*var z='zero ';
        var addstring = z + spword;
        var ssword = addstring .replace(",", " ");
        //alert(ssword);

        var sword = ssword.split(" ");
        //alert(addstring);
        //var ssword =sword.replace(",", " ");
        */
        for (var z = 0; z < spword.length; z++) {
            var ws1 = spword[0];
            var ws2 = spword[1];

            if (ws1 == "one") {
                var t1 = " zero one "

                var completestring = words2 + " Point" + t1 + ws2;
            } else if (ws1 == "two") {
                var t1 = " zero two "

                var completestring = words2 + " Point" + t1 + ws2;
            } else if (ws1 == "three") {
                var t1 = " zero three "

                var completestring = words2 + " Point" + t1 + ws2;
            } else if (ws1 == "four") {
                var t1 = " zero four "

                var completestring = words2 + " Point" + t1 + ws2;
            } else if (ws1 == "five") {
                var t1 = " zero five "

                var completestring = words2 + " Point" + t1 + ws2;
            } else if (ws1 == "six") {
                var t1 = " zero six "

                var completestring = words2 + " Point" + t1 + ws2;
            } else if (ws1 == "seven") {
                var t1 = " zero seven "

                var completestring = words2 + " Point" + t1 + ws2;
            } else if (ws1 == "eight") {
                var t1 = " zero eight "

                var completestring = words2 + " Point" + t1 + ws2;
            } else if (ws1 == "nine") {
                var t1 = " zero nine "

                var completestring = words2 + " Point" + t1 + ws2;
            } else if (ws1 == "twenty") {
                var t1 = " two "

                var completestring = words2 + " Point" + t1 + ws2;
            } else if (ws1 == "thirty") {
                var t1 = " three "

                var completestring = words2 + " Point" + t1 + ws2;
            } else if (ws1 == "forty") {
                var t1 = " four "

                var completestring = words2 + " Point" + t1 + ws2;
            } else if (ws1 == "fifty") {
                var t1 = " five "

                var completestring = words2 + " Point" + t1 + ws2;
            } else if (ws1 == "sixty") {
                var t1 = " six "

                var completestring = words2 + " Point" + t1 + ws2;
            } else if (ws1 == "seventy") {
                var t1 = " seven "

                var completestring = words2 + " Point" + t1 + ws2;
            } else if (ws1 == "eighty") {
                var t1 = " eight "

                var completestring = words2 + " Point" + t1 + ws2;
            } else if (ws1 == "ninety") {
                var t1 = " nine "

                var completestring = words2 + " Point" + t1 + ws2;
            } else if (ws1 == "ten") {
                var t1 = " one "

                var completestring = words2 + " Point" + t1 + ws2;
            } else if (ws1 == "eleven") {
                var t1 = " one one "

                var completestring = words2 + " Point" + t1 + ws2;
            } else if (ws1 == "twelve") {
                var t1 = " one two "

                var completestring = words2 + " Point" + t1 + ws2;
            } else if (ws1 == "thirteen") {
                var t1 = " one three "

                var completestring = words2 + " Point" + t1 + ws2;
            } else if (ws1 == "fourteen") {
                var t1 = " one four "

                var completestring = words2 + " Point" + t1 + ws2;
            } else if (ws1 == "fifteen") {
                var t1 = " one five "

                var completestring = words2 + " Point" + t1 + ws2;
            } else if (ws1 == "sixteen") {
                var t1 = " one six "

                var completestring = words2 + " Point" + t1 + ws2;
            } else if (ws1 == "seventeen") {
                var t1 = " one seven "

                var completestring = words2 + " Point" + t1 + ws2;
            } else if (ws1 == "eighteen") {
                var t1 = " one eight "

                var completestring = words2 + " Point" + t1 + ws2;

            } else if (ws1 == "nineteen") {
                var t1 = " one nine "

                var completestring = words2 + " Point" + t1 + ws2;

            }
            /* else if(ws1 == "one")
             {
                var t1 = " one "

                completestring = words2 + " Point" + t1 + ws2;

            }
            */




        }
        /* Function for text transform capitalize */
        var pieces = completestring.split(" ");
        for (var i = 0; i < pieces.length; i++) {
            var j = pieces[i].charAt(0).toUpperCase();
            pieces[i] = j + pieces[i].substr(1);
        }
        var string = pieces.join(" ");
        // document.getElementById('container3').value = string;

    }
    //alert(completestring);

    var words = completestring.split(" ");
    var histr = new Array();
    var j = 0;


    for (var i = 0; i < words.length; i++) {
        str = words[i];
        str1 = words[i + 1];


        if (str === 'Point') {
            histr[j] = ' দশমিক';
        }

        if (str === ',') {
            histr[j] = ' ';
        }
        if (str === '') {
            histr[j] = ' ';
        }
        if (str === 'hundred') {
            histr[j] = ' শত';
        }
        if (str === 'thousand') {
            histr[j] = ' হাজার';
        }
        if (str === 'lakh') {
            histr[j] = ' লাখ';
        }
        if (str === 'crore') {
            histr[j] = ' কোটি';
        }
        if (str === 'zero') {
            histr[j] = '  শুন্য';
        }
        /* if for one to ten*/
        if (str === 'one') {
            histr[j] = ' এক';
        }
        if (str === 'two') {
            histr[j] = ' দুই';
        }
        if (str === 'three') {
            histr[j] = ' তিন';
        }
        if (str === 'four') {
            histr[j] = ' চার';
        }
        if (str === 'five') {
            histr[j] = ' পাঁচ';
        }
        if (str === 'six') {
            histr[j] = ' ছয়';
        }
        if (str === 'seven') {
            histr[j] = ' সাত';
        }
        if (str === 'eight') {
            histr[j] = ' আট';
        }
        if (str === 'nine') {
            histr[j] = ' নয়';
        }
        if (str === 'ten') {
            histr[j] = ' দশ';
        }
        if (str === 'eleven') {
            histr[j] = ' এগারো';
        }
        if (str === 'twelve') {
            histr[j] = ' বারো';
        }
        if (str === 'thirteen') {
            histr[j] = ' তেরো';
        }
        if (str === 'fourteen') {
            histr[j] = ' চৌদ্দ';
        }
        if (str === 'fifteen') {
            histr[j] = ' পনেরো';
        }
        if (str === 'sixteen') {
            histr[j] = ' ষোল';
        }
        if (str === 'seventeen') {
            histr[j] = ' সতেরো';
        }
        if (str === 'eighteen') {
            histr[j] = ' আঠারো';
        }
        if (str === 'nineteen') {
            histr[j] = ' ঊনিশ';
        }

        if (str === 'twenty') {
            if (str1 === 'one') {
                histr[j] = ' একুশ';
            } else if (str1 === 'two') {
                histr[j] = ' বাইশ';
            } else if (str1 === 'three') {
                histr[j] = ' তেইশ';
            } else if (str1 === 'four') {
                histr[j] = ' চব্বিশ';
            } else if (str1 === 'five') {
                histr[j] = ' পঁচিশ';
            } else if (str1 === 'six') {
                histr[j] = ' ছাব্বিশ';
            } else if (str1 === 'seven') {
                histr[j] = ' সাতাশ';
            } else if (str1 === 'eight') {
                histr[j] = ' আঠাশ';
            } else if (str1 === 'nine') {
                histr[j] = ' ঊনত্রিশ';
            } else {
                histr[j] = ' বিশ';
                i--;
            }
            i++;
        }


        if (str === 'thirty') {

            if (str1 === 'one') {
                histr[j] = ' একত্রিশ';

            } else if (str1 === 'two') {
                histr[j] = ' বত্রিশ';

            } else if (str1 === 'three') {
                histr[j] = ' তেত্রিশ';

            } else if (str1 === 'four') {
                histr[j] = ' চৌত্রিশ';

            } else if (str1 === 'five') {
                histr[j] = ' পঁয়ত্রিশ';

            } else if (str1 === 'six') {
                histr[j] = ' ছত্রিশ';

            } else if (str1 === 'seven') {
                histr[j] = ' সাইত্রিশ';

            } else if (str1 === 'eight') {
                histr[j] = ' আটত্রিশ';

            } else if (str1 === 'nine') {
                histr[j] = ' ঊনচল্লিশ';

            } else {
                histr[j] = ' ত্রিশ';
                i--;
            }
            i++;
        }
        if (str === 'forty') {
            if (str1 === 'one') {
                histr[j] = ' একচল্লিশ';

            } else if (str1 === 'two') {
                histr[j] = ' বিয়াল্লিশ';

            } else if (str1 === 'three') {
                histr[j] = ' তেতাল্লিশ';

            } else if (str1 === 'four') {
                histr[j] = ' চুয়াল্লিশ';

            } else if (str1 === 'five') {
                histr[j] = ' পঁয়তাল্লিশ';

            } else if (str1 === 'six') {
                histr[j] = ' ছেচল্লিশ';

            } else if (str1 === 'seven') {
                histr[j] = ' সাতচল্লিশ';

            } else if (str1 === 'eight') {
                histr[j] = ' আটচল্লিশ';

            } else if (str1 === 'nine') {
                histr[j] = ' ঊনপঞ্চাশ';

            } else {
                histr[j] = ' চল্লিশ';
                i--;
            }
            i++;
        }
        if (str === 'fifty') {
            if (str1 === 'one') {
                histr[j] = ' একান্ন';

            } else if (str1 === 'two') {
                histr[j] = ' বায়ান্ন';

            } else if (str1 === 'three') {
                histr[j] = ' তিপ্পান্ন';

            } else if (str1 === 'four') {
                histr[j] = ' চুয়ান্ন';

            } else if (str1 === 'five') {
                histr[j] = ' পঞ্চান্ন';

            } else if (str1 === 'six') {
                histr[j] = ' ছাপ্পান্ন';

            } else if (str1 === 'seven') {
                histr[j] = ' সাতান্ন';

            } else if (str1 === 'eight') {
                histr[j] = ' আটান্ন';

            } else if (str1 === 'nine') {
                histr[j] = ' ঊনষাট';

            } else {
                histr[j] = ' পঞ্চাশ';
                i--;
            }
            i++;
        }
        if (str === 'sixty') {
            if (str1 === 'one') {
                histr[j] = ' একষট্টি';

            } else if (str1 === 'two') {
                histr[j] = ' বাষট্টি';

            } else if (str1 === 'three') {
                histr[j] = ' তেষট্টি';

            } else if (str1 === 'four') {
                histr[j] = ' চৌষট্টি';

            } else if (str1 === 'five') {
                histr[j] = ' পঁয়ষট্টি';

            } else if (str1 === 'six') {
                histr[j] = ' ছেষট্টি';

            } else if (str1 === 'seven') {
                histr[j] = ' সাতষট্টি';

            } else if (str1 === 'eight') {
                histr[j] = ' আটষট্টি';

            } else if (str1 === 'nine') {
                histr[j] = ' ঊনসত্তর';

            } else {
                histr[j] = ' ষাট';
                i--;
            }

            i++;
        }
        if (str === 'seventy') {
            if (str1 === 'one') {
                histr[j] = ' একাত্তর';

            } else if (str1 === 'two') {
                histr[j] = ' বাহাত্তর';

            } else if (str1 === 'three') {

                histr[j] = ' তিয়াত্তর';

            } else if (str1 === 'four') {
                histr[j] = ' চুয়াত্তর';

            } else if (str1 === 'five') {
                histr[j] = ' পঁচাত্তর';

            } else if (str1 === 'six') {
                histr[j] = ' ছিয়াত্তর';

            } else if (str1 === 'seven') {
                histr[j] = ' সাতাত্তর';

            } else if (str1 === 'eight') {
                histr[j] = ' আটাত্তর';

            } else if (str1 === 'nine') {
                histr[j] = ' ঊনঊননব্বই';

            } else {
                histr[j] = ' সত্তর';
                i--;
            }
            i++;
        }
        if (str === 'eighty') {
            if (str1 === 'one') {
                histr[j] = ' একাশি';

            } else if (str1 === 'two') {
                histr[j] = ' বিরাশি';

            } else if (str1 === 'three') {

                histr[j] = ' তিরাশি';

            } else if (str1 === 'four') {
                histr[j] = ' চুরাশি';

            } else if (str1 === 'five') {
                histr[j] = ' পঁচাশি';

            } else if (str1 === 'six') {
                histr[j] = ' ছিয়াশি';

            } else if (str1 === 'seven') {
                histr[j] = ' সাতাশি';

            } else if (str1 === 'eight') {
                histr[j] = '  আটাশি';

            } else if (str1 === 'nine') {
                histr[j] = ' ঊননব্বই';

            } else {
                histr[j] = ' আশি';
                i--;

            }
            i++;
        }
        if (str === 'ninety') {
            if (str1 === 'one') {
                histr[j] = ' একানব্বই';

            } else if (str1 === 'two') {
                histr[j] = ' বিরানব্বই';

            } else if (str1 === 'three') {

                histr[j] = ' তিরানব্বই';

            } else if (str1 === 'four') {
                histr[j] = ' চুরানব্বই';

            } else if (str1 === 'five') {
                histr[j] = ' পঁচানব্বই';

            } else if (str1 === 'six') {
                histr[j] = ' ছিয়ানব্বই';

            } else if (str1 === 'seven') {
                histr[j] = ' সাতানব্বই';

            } else if (str1 === 'eight') {
                histr[j] = ' আটানব্বই';

            } else if (str1 === 'nine') {
                histr[j] = ' নিরানব্বই';

            } else {
                histr[j] = 'নব্বই';
                i--;

            }

            i++;

        }
        j++;

    } //end of for loop

    for (q = 0; q < histr.length; q++) {
        result += histr[q];
    }

    return result;
}
window.convertAmount = convertAmount;
export default convertAmount;

