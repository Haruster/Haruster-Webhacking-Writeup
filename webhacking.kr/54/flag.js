function answer(i){
  x.open('GET','?m='+i,false);
  x.send(null);
  aview.innerHTML += x.responseText; // aview.innerHTML = aview.innerHTML + x.responseText; (출력하는 내용을 계속 끝까지 더해서 출력)
  i++;
  if(x.responseText) setTimeout("answer("+i+")",20);
  if(x.responseText=="") aview.innerHTML="?";
}
setTimeout("answer(0)",1000);
