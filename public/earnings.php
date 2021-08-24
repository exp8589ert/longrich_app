<?php 
require 'includes/check.php'; 
require 'header.php'; 

if (isset($_COOKIE['c_user'])) {

		$sessionData = $showDATA->getSessionData($_COOKIE['c_user']);
		if($_COOKIE['c_user'] === $sessionData['session_cookie']) {

			$email = $_SESSION['email'];
			$userStatus = $_SESSION['status'];
			$newSessId = $sessionData['session_id'];
			$loggedIn = $sessionData['session_token'];
			$loggedBool = $_SESSION['logged_in_token'];
			$newCookie = $_SESSION['new_sess_cookie'];

			if($newSessId != session_id() && $newCookie != $_COOKIE['c_user'] || empty($loggedIn) || $loggedBool != TRUE) {

			} 
			else {
					$userCred = $showDATA->acc_prof_ref_Table($email);
					$puserCode = $userCred['user_code'];
					$profImg = $userCred['prof_image'];
					$famName = $userCred['family_name'][0];
					$firstName = $userCred['first_name'][0];
			}
		}
	}
?>

<?php include'includes/logout.php'; ?>

<section class="wrapper" id="earning-wrapper">
<div class="earning-header emailus">
<div> 
<span href="#" class="title">SAMPLE EARNINGS</span> 
<span class="live-chat earnings">
<a href="https://longrichs.com" target="_self">Welcome</a>
<a href="forum" target="_self">Forum</a>
<a href="<?php echo 'profile?r_='.$puserCode.$_SESSION['rThrChar'].'' ?>" target="_self">Profile</a>
</span>

</div>
</div>

<div class="earning-samples-table-wrapper">
<div class="heading">This Performance Bonus is just one of the 10 different ways to earn from Longrich <span class="exchage-rate">(Exchange rate is 1USD = <span class="fa-naira">200 - Naira</span>)</span> &nbsp;<i class="fab fa-bandcamp"></i>.
</div>
<br />
<br />

<table id="earning-samples">
	<thead>
		<th>
			<tr>
				<td>Q-Silver Level</td>
				<td colspan="4" class="heading">(Reg. Amount = <span class="fa-naira">40,000</span>. Bonus = 8%) Weekly 3x3 earning sample - Entry = 60PV</td>
				<td></td>
			</tr>
		</th>
		<tr>
			<td>Weekly</td>
			<td>No. of Referrals</td>
			<td>Total New PV</td>
			<td>Total Cummulative PV</td>
			<td>Ranking</td>
			<td>Earnings (Performance Bonus Only)</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>1</td>
			<td>3</td>
			<td>180</td>
			<td>180</td>
			<td>Pre-Diamond</td>
			<td><span class="fa-dollar">10</span></td>
		</tr>

		<tr>
			<td>2</td>
			<td>9</td>
			<td>540</td>
			<td>720</td>
			<td>D1</td>
			<td><span class="fa-dollar">29</span></td>
		</tr>

		<tr>
			<td>3</td>
			<td>27</td>
			<td>1,620</td>
			<td>2,340</td>
			<td>D2</td>
			<td><span class="fa-dollar">87</span></td>
		</tr>

		<tr>
			<td>4</td>
			<td>81</td>
			<td>4,860</td>
			<td>7,200</td>
			<td>D3</td>
			<td><span class="fa-dollar">260</span></td>
		</tr>

		<tr>
			<td>5</td>
			<td>243</td>
			<td>14,580</td>
			<td>21,780</td>
			<td>D4</td>
			<td><span class="fa-dollar">778</span></td>
		</tr>

		<tr>
			<td>6</td>
			<td>729</td>
			<td>43,740</td>
			<td>65,520</td>
			<td>D4</td>
			<td><span class="fa-dollar">2,333</span></td>
		</tr>

		<tr>
			<td>7</td>
			<td>2,187</td>
			<td>131,220</td>
			<td>196,740</td>
			<td>D5</td>
			<td><span class="fa-dollar">6,999</span></td>
		</tr>

		<tr>
			<td>8</td>
			<td>6,561</td>
			<td>393,660</td>
			<td>590,400</td>
			<td>D7</td>
			<td><span class="fa-dollar">20,996</span></td>
		</tr>

		<tr>
			<td>9</td>
			<td>19,683</td>
			<td>1,180,980</td>
			<td>1,771,380</td>
			<td>Star-D 1</td>
			<td><span class="fa-dollar">62,985</span></td>
		</tr>

		<tr>
			<td>10</td>
			<td>59,049</td>
			<td>3,542,940</td>
			<td>5,314,320</td>
			<td>Star-D 2</td>
			<td><span class="fa-dollar">188,957</span></td>
		</tr>

		<tr>
			<td>11</td>
			<td>177,147</td>
			<td>10,628,820</td>
			<td>15,943,140</td>
			<td>Star-D 3</td>
			<td><span class="fa-dollar">566,870</span></td>
		</tr>

		<tr>
			<td>12</td>
			<td>531,441</td>
			<td>31,886,460</td>
			<td>47,829,600</td>
			<td>Star-D 4</td>
			<td><span class="fa-dollar">1,700,611</span></td>
		</tr>

		<tr>
			<td colspan="6">.</td>
		</tr>

	</tbody>
</table>

<table id="earning-samples">
		<thead>
		<th>
			<tr>
				<td>Silver Level</td>
				<td colspan="4" class="heading">(Reg. Amount = <span class="fa-naira">75,000</span>. Bonus = 8%) Weekly 3x3 earning sample - Entry = 120PV</td>
				<td></td>
			</tr>
		</th>

		<tr>
			<td>Weekly</td>
			<td>No. of Referrals</td>
			<td>Total New PV</td>
			<td>Total Cummulative PV</td>
			<td>Ranking</td>
			<td>Earnings (Performance Bonus Only)</td>
		</tr>
		</thead>
		<tbody>
		<tr>
			<td>1</td>
			<td>3</td>
			<td>360</td>
			<td>360</td>
			<td>Pre-Diamond</td>
			<td><span class="fa-dollar">20</span></td>
		</tr>

		<tr>
			<td>2</td>
			<td>9</td>
			<td>1,080</td>
			<td>1,440</td>
			<td>D1</td>
			<td><span class="fa-dollar">58</span></td>
		</tr>

		<tr>
			<td>3</td>
			<td>27</td>
			<td>3,240</td>
			<td>4,680</td>
			<td>D3</td>
			<td><span class="fa-dollar">173</span></td>
		</tr>

		<tr>
			<td>4</td>
			<td>81</td>
			<td>9,720</td>
			<td>14,400</td>
			<td>D3</td>
			<td><span class="fa-dollar">518</span></td>
		</tr>

		<tr>
			<td>5</td>
			<td>243</td>
			<td>29,160</td>
			<td>43,560</td>
			<td>D4</td>
			<td><span class="fa-dollar">1,555</span></td>
		</tr>

		<tr>
			<td>6</td>
			<td>729</td>
			<td>87,480</td>
			<td>131,040</td>
			<td>D5</td>
			<td><span class="fa-dollar">4,666</span></td>
		</tr>

		<tr>
			<td>7</td>
			<td>2,187</td>
			<td>262,440</td>
			<td>393,480</td>
			<td>D6</td>
			<td><span class="fa-dollar">13,997</span></td>
		</tr>

		<tr>
			<td>8</td>
			<td>6,561</td>
			<td>787,320</td>
			<td>1,180,800</td>
			<td>D7</td>
			<td><span class="fa-dollar">41,990</span></td>
		</tr>

		<tr>
			<td>9</td>
			<td>19,683</td>
			<td>2,361,960</td>
			<td>3,542,760</td>
			<td>Star-D 1</td>
			<td><span class="fa-dollar">125,971</span></td>
		</tr>

		<tr>
			<td>10</td>
			<td>59,049</td>
			<td>7,085,880</td>
			<td>10,628,640</td>
			<td>Star-D 3</td>
			<td><span class="fa-dollar">377,914</span></td>
		</tr>

		<tr>
			<td>11</td>
			<td>177,147</td>
			<td>21,257,640</td>
			<td>31,886,280</td>
			<td>Star-D 4</td>
			<td><span class="fa-dollar">1,133,741</span></td>
		</tr>

		<tr>
			<td>12</td>
			<td>531,441</td>
			<td>63,772,920</td>
			<td>95,659,200</td>
			<td>Star-D 5</td>
			<td><span class="fa-dollar">3,401,222</span></td>
		</tr>

		<tr>
			<td colspan="6">.</td>
		</tr>

	</tbody>
</table>

<table id="earning-samples">
		<thead>
		<th>
			<tr>
				<td>Gold Level</td>
				<td colspan="4" class="heading">(Reg. Amount = <span class="fa-naira">120,000</span>. Bonus = 10%) Weekly 3x3 earning sample - Entry = 240PV</td>
				<td></td>
			</tr>
		</th>

			<tr>
				<td>Weekly</td>
				<td>No. of Referrals</td>
				<td>Total New PV</td>
				<td>Total Cummulative PV</td>
				<td>Ranking</td>
				<td>Earnings (Performance Bonus Only)</td>
			</tr>
		</thead>
		<tbody>
		<tr>
			<td>1</td>
			<td>3</td>
			<td>720</td>
			<td>720</td>
			<td>D1</td>
			<td><span class="fa-dollar">48</span></td>
		</tr>

		<tr>
			<td>2</td>
			<td>9</td>
			<td>2,160</td>
			<td>2,880</td>
			<td>D2</td>
			<td><span class="fa-dollar">144</span></td>
		</tr>

		<tr>
			<td>3</td>
			<td>27</td>
			<td>6,480</td>
			<td>9,360</td>
			<td>D3</td>
			<td><span class="fa-dollar">432</span></td>
		</tr>

		<tr>
			<td>4</td>
			<td>81</td>
			<td>19,440</td>
			<td>28,800</td>
			<td>D4</td>
			<td><span class="fa-dollar">1,296</span></td>
		</tr>

		<tr>
			<td>5</td>
			<td>243</td>
			<td>58,320</td>
			<td>87,120</td>
			<td>D5</td>
			<td><span class="fa-dollar">3,888</span></td>
		</tr>

		<tr>
			<td>6</td>
			<td>729</td>
			<td>174,960</td>
			<td>262,080</td>
			<td>D6</td>
			<td><span class="fa-dollar">11,664</span></td>
		</tr>

		<tr>
			<td>7</td>
			<td>2,187</td>
			<td>524,880</td>
			<td>786,960</td>
			<td>D7</td>
			<td><span class="fa-dollar">34,992</span></td>
		</tr>

		<tr>
			<td>8</td>
			<td>6,561</td>
			<td>1,574,640</td>
			<td>2,361,600</td>
			<td>Star-D 1</td>
			<td><span class="fa-dollar">104,976</span></td>
		</tr>

		<tr>
			<td>9</td>
			<td>19,683</td>
			<td>4,723,920</td>
			<td>7,085,520</td>
			<td>Star-D 2</td>
			<td><span class="fa-dollar">314,928</span></td>
		</tr>

		<tr>
			<td>10</td>
			<td>59,049</td>
			<td>14,171,760</td>
			<td>21,257,280</td>
			<td>Star-D 4</td>
			<td><span class="fa-dollar">944,784</span></td>
		</tr>

		<tr>
			<td>11</td>
			<td>177,147</td>
			<td>42,515,280</td>
			<td>63,772,560</td>
			<td>Star-D 5</td>
			<td><span class="fa-dollar">2,834,352</span></td>
		</tr>

		<tr>
			<td>12</td>
			<td>531,441</td>
			<td>127,545,840</td>
			<td>191,318,400</td>
			<td>Star-D 5+</td>
			<td><span class="fa-dollar">8,503,056</span></td>
		</tr>

		<tr>
			<td colspan="6">.</td>
		</tr>

	</tbody>
</table>

<table id="earning-samples">

		<thead>
		<th>
			<tr>
				<td>Platinum Level</td>
				<td colspan="4" class="heading">(Reg. Amount = <span class="fa-naira">320,000</span>. Bonus = 12%) Weekly 3x3 earning sample - Entry = 720PV</td>
				<td></td>
			</tr>
		</th>

			<tr>
				<td>Weekly</td>
				<td>No. of Referrals</td>
				<td>Total New PV</td>
				<td>Total Cummulative PV</td>
				<td>Ranking</td>
				<td>Earnings (Performance Bonus Only)</td>
			</tr>
		</thead>
		<tbody>
		<tr>
			<td>1</td>
			<td>3</td>
			<td>2,160</td>
			<td>2,160</td>
			<td>D1</td>
			<td><span class="fa-dollar">173</span></td>
		</tr>

		<tr>
			<td>2</td>
			<td>9</td>
			<td>6,480</td>
			<td>8,640</td>
			<td>D3</td>
			<td><span class="fa-dollar">518</span></td>
		</tr>

		<tr>
			<td>3</td>
			<td>27</td>
			<td>19,440</td>
			<td>28,080</td>
			<td>D4</td>
			<td><span class="fa-dollar">1,555</span></td>
		</tr>

		<tr>
			<td>4</td>
			<td>81</td>
			<td>58,320</td>
			<td>86,400</td>
			<td>D5</td>
			<td><span class="fa-dollar">4,666</span></td>
		</tr>

		<tr>
			<td>5</td>
			<td>243</td>
			<td>174,960</td>
			<td>144,720</td>
			<td>D5</td>
			<td><span class="fa-dollar">13,997</span></td>
		</tr>

		<tr>
			<td>6</td>
			<td>729</td>
			<td>524,880</td>
			<td>669,600</td>
			<td>D7</td>
			<td><span class="fa-dollar">41,990</span></td>
		</tr>

		<tr>
			<td>7</td>
			<td>2,187</td>
			<td>1,574,640</td>
			<td>2,244,240</td>
			<td>Star-D 1</td>
			<td><span class="fa-dollar">125,971</span></td>
		</tr>

		<tr>
			<td>8</td>
			<td>6,561</td>
			<td>4,723,920</td>
			<td>6,968,160</td>
			<td>Star-D 2</td>
			<td><span class="fa-dollar">377,914</span></td>
		</tr>

		<tr>
			<td>9</td>
			<td>19,683</td>
			<td>14,171,760</td>
			<td>21,139,920</td>
			<td>Star-D 4</td>
			<td><span class="fa-dollar">1,133,741</span></td>
		</tr>

		<tr>
			<td>10</td>
			<td>59,049</td>
			<td>42,515,280</td>
			<td>63,655,200</td>
			<td>Star-D 5</td>
			<td><span class="fa-dollar">3,401,222</span></td>
		</tr>

		<tr>
			<td>11</td>
			<td>177,147</td>
			<td>127,545,840</td>
			<td>191,201,040</td>
			<td>Star-D 5+</td>
			<td><span class="fa-dollar">10,203,667</span></td>
		</tr>

		<tr>
			<td>12</td>
			<td>531,441</td>
			<td>382,637,520</td>
			<td>573,838,560</td>
			<td>Star-D 5+</td>
			<td><span class="fa-dollar">30,611,002</span></td>
		</tr>

		<tr>
			<td colspan="6">.</td>
		</tr>
	</tbody>
</table>

<table id="earning-samples">
		<thead>
		<th>
			<tr>
				<td>Platinum VIP Level</td>
				<td colspan="4" class="heading">(Reg. Amount = <span class="fa-naira">750,000</span>. Bonus = 12%Pv + 1%Gs) Weekly 3x3 earning sample - Entry = 1,680PV</td>
				<td></td>
			</tr>
		</th>

			<tr>
				<td>Weekly</td>
				<td>No. of Referrals</td>
				<td>Total New PV</td>
				<td>Total Cummulative PV</td>
				<td>Ranking</td>
				<td>Earnings (Performance Bonus Only)</td>
			</tr>
		</thead>
		<tbody>
		<tr>
			<td>1</td>
			<td>3</td>
			<td>5,040</td>
			<td>5,040</td>
			<td>D3</td>
			<td><span class="fa-dollar">403 + 1% GS</span></td>
		</tr>

		<tr>
			<td>2</td>
			<td>9</td>
			<td>15,120</td>
			<td>20,160</td>
			<td>D4</td>
			<td><span class="fa-dollar">1,210 + 1% GS</span></td>
		</tr>

		<tr>
			<td>3</td>
			<td>27</td>
			<td>45,360</td>
			<td>65,520</td>
			<td>D4</td>
			<td><span class="fa-dollar">3,629 + 1% GS</span></td>
		</tr>

		<tr>
			<td>4</td>
			<td>81</td>
			<td>136,080</td>
			<td>201,600</td>
			<td>D5</td>
			<td><span class="fa-dollar">10,886 + 1% GS</span></td>
		</tr>

		<tr>
			<td>5</td>
			<td>243</td>
			<td>408,240</td>
			<td>609,840</td>
			<td>D7 </td>
			<td><span class="fa-dollar">32,659 + 1% GS</span></td>
		</tr>

		<tr>
			<td>6</td>
			<td>729</td>
			<td>1,224,720</td>
			<td>1,834,560</td>
			<td>Star-D 1</td>
			<td><span class="fa-dollar">97,978 + 1% GS</span></td>
		</tr>

		<tr>
			<td>7</td>
			<td>2,187</td>
			<td>3,674,160</td>
			<td>5,508,720</td>
			<td>Star-D 2</td>
			<td><span class="fa-dollar">293,933 + 1% GS</span></td>
		</tr>

		<tr>
			<td>8</td>
			<td>6,561</td>
			<td>11,022,480</td>
			<td>16,531,200</td>
			<td>Star-D 3</td>
			<td><span class="fa-dollar">881,798 + 1% GS</span></td>
		</tr>

		<tr>
			<td>9</td>
			<td>19,683</td>
			<td>33,067,440</td>
			<td>49,598,640</td>
			<td>Star-D 4</td>
			<td><span class="fa-dollar">2,645,395 + 1% GS</span></td>
		</tr>

		<tr>
			<td>10</td>
			<td>59,049</td>
			<td>99,202,320</td>
			<td>148,800,960</td>
			<td>Star-D 5</td>
			<td><span class="fa-dollar">7,936,186 + 1% GS</span></td>
		</tr>

		<tr>
			<td>11</td>
			<td>177,147</td>
			<td>297,606,960</td>
			<td>446,407,920</td>
			<td>Star-D 5+</td>
			<td><span class="fa-dollar">23,808,557 + 1% GS</span></td>
		</tr>

		<tr>
			<td>12</td>
			<td>531,441</td>
			<td>892,820,880</td>
			<td>1,339,228,800</td>
			<td>Star-D 5+</td>
			<td><span class="fa-dollar">71,425,670 + 1% GS</span></td>
		</tr>

		<tr>
			<td colspan="6">.</td>
		</tr>

	</tbody>
</table>
</div>
</section>
<?php include 'x-footer.php'; ?>