<?php
include_once ("tridenyseznam.php");
//použití
testI();
echo "<br><br>";
testS();

function testI() {
$list = new TridenySeznam();

echo $list->vlozPrvek(3);
echo $list->tiskVelky()."<br>";
echo $list->vlozPrvek(6);  
echo $list->tiskVelky()."<br>";
echo $list->vlozPrvek(4);
echo $list->tiskVelky()."<br>";   
echo $list->vlozPrvek("A");
echo $list->tiskVelky()."<br>"; 
echo $list->vlozPrvek(2);
echo $list->tiskVelky()."<br>";
echo $list->vlozPrvek(1);
echo $list->tiskVelky()."<br>";   
echo $list->vlozPrvek(5);
echo $list->tiskVelky()."<br>"; 
echo $list->smazPrvek(3)."<br>";   
echo $list->smazPrvek(3)."<br>";    
echo $list->tiskVelky()."<br>"; 
echo $list->delka(); 
echo $list->tiskVelky()."<br>";
echo $list->najdiPrvek(4)->data."<br>";
echo $list->najdiPrvek(3)->data."<br>";
echo $list->najdiVetsi(3)->data."<br>";
echo $list->najdiMensi(3)->data."<br>";    
}

function testS() {
$list2 = new TridenySeznam();

echo $list2->vlozPrvek(A);
echo $list2->tiskVelky()."<br>"; 
echo $list2->smazPrvek(C)."<br>";
echo $list2->tiskVelky()."<br>"; 
echo $list2->vlozPrvek(D);
echo $list2->tiskVelky()."<br>"; 
echo $list2->smazPrvek(A)."<br>";
echo $list2->tiskVelky()."<br>"; 
echo $list2->smazPrvek(D)."<br>";
echo $list2->tiskVelky()."<br>"; 
echo $list2->vlozPrvek(Babek);
echo $list2->tiskVelky()."<br>"; 
echo $list2->vlozPrvek(f);
echo $list2->tiskVelky()."<br>"; 
echo $list2->vlozPrvek(Bob);
echo $list2->tiskVelky()."<br>"; 
$list2->najdiPrvek(Babek);
$list2->najdiPrvek(D);
$list2->najdiPrvek(F);
$list2->najdiPrvek(f);
echo $list2->vlozPrvek(Bob);
$list2->tiskVelky()."<br>"; 
echo $list2->vlozPrvek(Bob);
echo $list2->tiskVelky()."<br>"; 
echo $list2->smazPrvek(Bob)."<br>";
echo $list2->tiskVelky()."<br>"; 
echo $list2->tisk();
}
?>