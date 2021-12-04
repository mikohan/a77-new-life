<?php

$tpl_head = <<<"STR"
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
											<h3 style="color: #0a66c2; text-align: center; font-size: 24px;">
												Здравствуйте уважаемый $firstname $lastname!
											</h3>
											<p style="font-size: 14px">
												Спасибо за Ваш заказ! Менеджеры свяжутся с Вами в ближайшее рабочее
												время.
											</p>
											<p style="font-size: 14px">
												Вы можете позвонить нам по любому вопросу по телефону
												<span style="color: #0a66c2">$company_phone</span>
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
$tpl_end = <<<"STR"
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
																	font-size: 24px;
																	text-align: center;
																"
															>
																С Уважением, Компания Ангара.
															</h3>
														</td>
													</tr>
													<tr>
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
