#!/bin/python

def gentable():
	print("<table><tbody>")

	print("<tr><th>POINTS</th><th>COST</th></tr>")

	for x in range(5,151,5):
		y = (x/5)-1
		print("<tr><td>%d</td><td>%d</td></tr>" % (x,(y*y)*100/4) )

	print("</tbody></table>")

gentable()
