function Calculate()
{
    zakat = document.getElementById("zakat");
    // taking all inputs
    var goldvalue = eval(document.getElementById("goldvalue").value);
    var silvervalue = eval(document.getElementById("silvervalue").value);
    var cash = eval(document.getElementById("cash").value);
    var loangiven = eval(document.getElementById("loangiven").value);
    var loan = eval(document.getElementById("loan").value);
    var tijarat = eval(document.getElementById("tijarat").value);
    var gold = eval(document.getElementById("gold").value);
    var silver = eval(document.getElementById("silver").value);
    
    //taking weight inputs
    var marketgold = document.getElementById("marketgold").value;
    var marketsilver = document.getElementById("marketsilver").value;
    var yourgold = document.getElementById("yourgold").value;
    var yoursilver = document.getElementById("yoursilver").value;

    //decorating output 
    zakat.style.border = "2px dotted black";
    
    //converting market gold in tola
    if(marketgold == "gram")
    {
        goldvalue = 0.085735260233307 * goldvalue;
    }
    else if(marketgold == "kg")
    {
        goldvalue = 80 * goldvalue;
    }
    else if(marketgold == "ounce")
    {
        goldvalue = goldvalue * 2.26796185;
    }

    //converting market silver in tola
    if(marketsilver == "gram")
    {
        silvervalue = 0.085735260233307 * silvervalue;
    }
    else if(marketsilver == "kg")
    {
        silvervalue = 80 * silvervalue;
    }
    else if(marketsilver == "ounce")
    {
        silvervalue = silvervalue * 2.26796185;
    }

    //calculating user's total silver in tolas 
    if(yoursilver == "tolas")
    {
        silver = 1 * silver;
    }
    else if(yoursilver == "grams")
    {
        
        silver = 0.085735260233307 * silver;
    }
    else if(yoursilver == "kgs")
    {
        silver = 80 * silver;
    }
    else if(yoursilver == "ounces")
    {
        silver = silver * 2.26796185;
    }

    //calculating user's total gold in tolas
    if(yourgold == "tolas")
    {
        gold = 1 * gold;
    }
    else if(yourgold == "grams")
    {
        window.alert(silver);
        gold = 0.085735260233307 * gold;
    }
    else if(yourgold == "kgs")
    {
        gold = 80 * gold;
    }
    else if(yourgold == "ounces")
    {
        gold = gold * 2.26796185;
    }
    
    //converting user's gold and silver amount in currency 
    gold = goldvalue * gold;
    silver = silvervalue * silver;

    //calculating user's total money illegibal for calculation
    var halfCal = (loangiven + cash + gold + silver + tijarat) - loan; 
   
    //conparing money with minimum amount required for zakat and generating result 
    if(goldvalue == 0 || silvervalue == 0)
    {
        zakat.innerHTML = ("Invalid Input! Gold/Silver value in market cannot be 0!");
    }
    //if you have only gold and nothing else
    else if( (cash == 0) && (loangiven == 0) && (tijarat == 0) && (silver == 0) && (gold >0) )
    {
        window.alert("goldvalue*7.d5");
        if(halfCal >= (goldvalue*7.5))
        {
            zakat.innerHTML = (halfCal/40 + " is FARZ on you!");    
        }
        else
        {
        zakat.innerHTML = "Zakat is NOT Farz on you!";
        }
    } 
    else if( halfCal >= (goldvalue*7.5) || halfCal >= (silvervalue*52.5) )
    {
        zakat.innerHTML = (halfCal/40 + " is FARZ on you!");
    }
    else
    {
        zakat.innerHTML = "Zakat is NOT Farz on you!";
    }   
}