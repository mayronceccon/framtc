<?php
include ("Library/app.ado/TExpression.class.php");
include ("Library/app.ado/TFilter.class.php");
include ("Library/app.ado/TCriteria.class.php");
include ("Library/app.ado/TSqlInstruction.class.php");
include ("Library/app.ado/TSqlInsert.class.php");
include ("Library/app.ado/TSqlUpdate.class.php");
include ("Library/app.ado/TSqlDelete.class.php");
include ("Library/app.ado/TSqlSelect.class.php");

$filtro = new TFilter("nome", "ILIKE", "%Mayron%");
echo $filtro->dump() . "<br><hr>";

$filtro = new TFilter("idade", ">=", 22);
echo $filtro->dump(). "<br><hr>";

$filtro = new TFilter("idade", "IN", array(22,15,24));
echo $filtro->dump() . "<br><hr>";

$criteria = new TCriteria();
$criteria->add(new TFilter("nome", "ilike", "%Mayron%"), TExpression::OR_OPERATOR);
$criteria->add(new TFilter("nome", "ilike", "%Ceccon%"), TExpression::OR_OPERATOR);
echo $criteria->dump() . "<br><hr>";

$sql = new TSqlInsert();
$sql->setEntity("pessoas");

$sql->setRowData("nome", "Mayron");
$sql->setRowData("idade", 22);
$sql->setRowData("profissao");
$sql->setRowData("valido", true);

echo $sql->getInstruction() . "<br><hr>";

$sql = new TSqlUpdate();
$sql->setEntity("pessoas");

$sql->setRowData("nome", "Mayron");
$sql->setRowData("idade", 22);
$sql->setRowData("profissao");
$sql->setRowData("valido", true);

echo $sql->getInstruction() . "<br><hr>";

$criteria = new TCriteria();
$criteria->add(new TFilter("nome", "ilike", "%Mayron%"), TExpression::OR_OPERATOR);
$criteria->add(new TFilter("nome", "ilike", "%Ceccon%"), TExpression::OR_OPERATOR);

$sql = new TSqlDelete();
$sql->setEntity("pessoas");
$sql->setCriteria($criteria);

echo $sql->getInstruction() . "<br><hr>";

$criteria = new TCriteria();
$criteria->add(new TFilter("nome", "ilike", "%Mayron%"), TExpression::OR_OPERATOR);
$criteria->add(new TFilter("nome", "ilike", "%Ceccon%"), TExpression::OR_OPERATOR);

$sql = new TSqlSelect();
$sql->setEntity("pessoas");

$sql->addColumn("nome");
$sql->addColumn("profissao");

$sql->setCriteria($criteria);

echo $sql->getInstruction() . "<br><hr>";

$sql = new TSqlSelect();
$sql->setEntity("pessoas");

echo $sql->getInstruction() . "<br><hr>";