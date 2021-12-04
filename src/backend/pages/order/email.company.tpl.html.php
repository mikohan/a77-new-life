<?php


$tpl_head_company = <<<"STR"
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Simple Transactional Email</title>
	</head>

	<body style="font-family: 'Roboto', sans-serif">
		<table
			role="presentation"
			border="0"
			cellpadding="0"
			cellspacing="0"
			style="width: 100%; background-color: #f3f2ef"
		>
			<tr>
				<td style="padding-top: 24px; padding-bottom: 24px;">
					<table
						role="presentation"
						cellpadding="0"
						cellspacing="0"
						style="margin: 0 auto !important;	width: 600px; background-color: white;"
					>
						<!-- START MAIN CONTENT AREA -->
						<tr>
							<td>
								<table
									role="presentation"
									border="0"
									cellpadding="0"
									cellspacing="0"
									style="width: 560px; background-color: white; margin: 0 auto !important"
								>
									<tr>
										<td style="padding: 24px">
											<h3 style="color: #0a66c2; font-size: 24px; text-align: center">
												Здравствуйте уважаемый Менеджер!
											</h3>
											<p style="font-size: 14px">
												Свяжитесь с клиентом пожалуйста как можно скорее по телефону - {$phone}.
											</p>
											<p style="font-size: 14px; color: #0a66c2; font-weight: bold;">
												Помни! - клиент ждет 8 минут, а затем звонит конкурентам.
											</p>
											<p style="font-size: 14px; color: #0a66c2">{$company_site}</p>
											<table
												role="presentation"
												cellpadding="0"
												cellspacing="0"
												style="width: 100%"
											>
												<tbody>
													<tr>
														<td align="left">
															<table
																role="presentation"
																style="
																	width: 100%;
																	border-collapse: collapse;
																	border-spacing: 0px;
																"
															>
																<thead>
																	<tr
																		style="
																			border-bottom: 1px solid #c0c5ca;
																			line-height: 24px;
																		"
																	>
																		<th>SKU</th>
																		<th>Название</th>
																		<th>Цена</th>
																		<th>Количество</th>
																		<th>Сумма</th>
																	</tr>
																</thead>
																<tbody>
STR;
$tpl_end_company = <<<"STR"
</tbody>
																<tfoot>
																	<tr
																		style="
																			border-bottom: 1px solid #c0c5ca;
																			line-height: 24px;
																		"
																	>
																		<th style="text-align: left" colspan="4">
																			Всего позиций: {$total_count}
																		</th>
																		<td colspan="2">&#8381; ${total_sum}</td>
																	</tr>
																</tfoot>
															</table>
														</td>
													</tr>
													<tr>
														<td style="height: 24px"></td>
													</tr>
													<tr>
														<td style="height: 24px">
															<h3
																style="
																	color: #0a66c2;
																	font-size: 1.5rem;
																	text-align: center;
																"
															>
																С Уважением, Компания Ангара.
															</h3>
														</td>
													</tr>
													<tr>
														<td style="width: 100%; text-align: center">
															<table
																role="presentation"
																style="
																	margin: 0 auto !important;
																	width: 100%;
																	border-collapse: collapse;
																	border-spacing: 0px;
																"
															>
																<thead>
																	<tr
																		style="
																			border-bottom: 1px solid #c0c5ca;
																			line-height: 24px;
																		"
																	>
																		<th colspan="2">Данные клиента</th>
																	</tr>
																</thead>
																<tbody>
																	<tr
																		style="
																			border-bottom: 1px solid #c0c5ca;
																			line-height: 24px;
																		"
																	>
																		<td>Telephone</td>
																		<td>$phone</td>
																	</tr>
																	<tr
																		style="
																			border-bottom: 1px solid #c0c5ca;
																			line-height: 24px;
																		"
																	>
																		<td>Email</td>
																		<td>$email</td>
																	</tr>
																	<tr
																		style="
																			border-bottom: 1px solid #c0c5ca;
																			line-height: 24px;
																		"
																	>
																		<td>Фамилия</td>
																		<td>$lastname</td>
																	</tr>
																	<tr
																		style="
																			border-bottom: 1px solid #c0c5ca;
																			line-height: 24px;
																		"
																	>
																		<td>Имя</td>
																		<td>$firstname</td>
																	</tr>
																	<tr
																		style="
																			border-bottom: 1px solid #c0c5ca;
																			line-height: 24px;
																		"
																	>
																		<td>Город</td>
																		<td>$city</td>
																	</tr>
																	<tr
																		style="
																			border-bottom: 1px solid #c0c5ca;
																			line-height: 24px;
																		"
																	>
																		<td>Адрес</td>
																		<td>$street</td>
																	</tr>
																	<tr
																		style="
																			border-bottom: 1px solid #c0c5ca;
																			line-height: 24px;
																		"
																	>
																		<td>Комментарии</td>
																		<td>$comment</td>
																	</tr>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>

						<!-- END MAIN CONTENT AREA -->
					</table>
				</td>
				<td>&nbsp;</td>
			</tr>
		</table>
	</body>
</html>
STR;
