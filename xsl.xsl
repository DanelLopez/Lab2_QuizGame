<?xml version="1.0" ?> 
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform"> 
<xsl:template match="/"> 
<HTML> 
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</meta>
<script type="text/javascript">
	function mensaje(){
	alert("La pregunta ha sido introducida correctamente");
	}
	</script>
</HEAD>

<BODY onLoad='mensaje()'> 
<P>Contenido del XML</P>
<TABLE border="1"> 
<THEAD> 
<TR> 
<TH>Pregunta</TH> 
<TH>Complejidad</TH> 
<TH>Temática</TH> 
</TR> 
</THEAD> 
<xsl:for-each select="/assessmentItems/assessmentItem" > 
<TR> 
<TD>
<FONT SIZE="2" COLOR="red" FACE="Verdana"> 
<xsl:value-of select="itemBody"/> 

<BR/> 
</FONT>
 </TD>
 <TD> 
 <FONT SIZE="2" COLOR="blue" FACE="Verdana">
 <xsl:value-of select="@complexity"/> <BR/>
 </FONT> 
 </TD> 
 <TD> 
 <FONT SIZE="2" COLOR="blue" FACE="Verdana">
 <xsl:value-of select="@subject"/> <BR/>
 </FONT> 
 </TD> 
 </TR> 
 </xsl:for-each> 
 </TABLE> 
 </BODY> 
 </HTML> 
 </xsl:template>
 </xsl:stylesheet>