
<a href = "admincaptinh/vanban/convertToPDF1"> convertToPDF1</a>
<table>
	<caption>table title and/or explanatory text</caption>
	<thead>
		<tr>
			<th>
			@for ($i = 0; $i < 10; $i++)
    				The current value is {{ $i }}
            @endfor
			</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>
				@for ($i = 0; $i < 10; $i++)
    				The current value is {{ $i }}
            	@endfor
            </td>
		</tr>
	</tbody>
</table>
