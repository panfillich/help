<?php 

$test_srting = '����� 1, 911, ������������, ���� 606-33/��20, �����';

$help = '������ ������ � ���������';
show_result("/�����/", $test_srting, $help);

$help = '���������� ������ ������������ ����� ���� ���������, ������� � ��� ���������';
show_result("/[�����]/", $test_srting, $help);

$help = '����� ��� ����� ��������';
show_result("/[�-��-�]/", $test_srting, $help);

$help = '����� "." - ����� ������';
show_result("/.����/", $test_srting, $help);

$help = '����� ��� �������� ��� "|" - ���������� ��������� ��������';
show_result("/����|������������/", $test_srting, $help);

$help = '��� ���������� ������������������ �������� �� ������ ����� ���� ��� �������� ������ "^" ������ []!!!';
show_result("/[^����]/", $test_srting, $help);

$help = '^ - ������ ������, $ - ����� ������, ��� ������������� �������� \ ����� ����. ���������';
show_result("/^�����|�����$|\//", $test_srting, $help);

echo 'Perl-����������� ���������� ��������� <br />';

$help = '������������. /search/mod : i - ������������� ��������; x - ������������� ��������';
show_result("/��� � /xi", $test_srting, $help);



echo '���������� ��������� ����� �������� ��� ������ �������������� - ��� ���������� ������� +, ?, *. <br />';
echo '������������� ������� � ���, ������� ��� ������������������ �������� ����� ����������� � ������ <br />';
echo '� ����������� ��������������� ����� ��� ����� ���������, � ������� ��� �����������.<br />';
echo '"a+" - ���� �� ���� � (������ "���" � "����" ������������� ����� ���������, � ������ "���" - ���);<br />';
echo '"a?" - ���� ��� ���� � (������ "���" � "���" ������������� ����� ���������, � ������ "����" - ���);<br />';
echo '"a*" - ���� ��� ����� � (������ "���" � "����" � "���" ������������� ����� ���������).;<br /><br />';

echo '������� - ��� ����� � �������� �������, ����������� ���������� ��������� � ������ ��������� ���������, ��������������� ��������������� �������:

    "xy{2}" ������������� ������, � ������� �� x ������� ��� y;
    "xy{2,}" ������������� ������, � ������� �� x ������� �� ����� ���� y (����� ���� � ������);
    "xy{2,6}" ������������� ������, � ������� �� x ������� �� ���� �� ����� y;

��� �������� ���������� ��������� �� ������ �������, � �� ������������������, ������������ ������� ������:

    "x(yz){2,6}" ������������� ������, � ������� �� x ������� �� ���� �� ����� ������������������� yz;
    "x(yz)*" ������������� ������, � ������� �� x ������� ���� � ����� ������������������� yz';



function show_result($template, $string, $help){
	$count =  preg_match_all($template, $string, $maches/*, PREG_OFFSET_CAPTURE*/); //���������� � ���������

	echo $help.'<br />';
	echo "������: \"{$template}\" <br />";
	echo "����������: {$count} <br />";
	
	if(!empty($maches)){
		$result  = '���������: ';
		$result .= '['.implode ( '] [' , $maches[0]).'.]';
		echo $result.'<br />';
	}
	
	echo "������ : {$string} <br />";
	echo '<br />';
}
