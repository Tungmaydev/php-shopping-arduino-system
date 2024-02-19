<?php
$Message  = " 
     <span style='font-size: 18px;'>
        สวัสดีค่ะ คุณ $customer_payment &nbsp; <br>
        คุณได้ทำรายการสั่งซื้อสินค้าที่ร้าน Arduino Bangkok  โดยมีรายละเอียดดังนี้</span><br><br>               

               <span style='font-size: 14px; color:#009999; text-align:left; font-weight: bold;'>ข้อมูลรายการสั่งซื้อทั่วไป</span><br>
               <table width='50%' border='0'>
                     <tr>
                         <td style='font-size: 14px; font-weight: bold; width: 20%;'>เลขที่การสั่งซื้อ:</td>
                         <td style='color:#999; font-size: 14px;'>$invoice</td>
                     </tr>
                     <tr>
                        <td style='font-size: 14px; font-weight: bold;'>วันที่สั่งซื้อ :</td>
                        <td style='color:#999; font-size: 14px;'>$od_date</td>
                     </tr>
                     <tr>
                         <td style='font-size: 14px; font-weight: bold;'>ราคารวม  :</td>
                         <td style='color:#999; font-size: 14px;'> $amt &nbsp;บาท</td>
                     </tr>                
               </table><br>           
             
              
             
             <span style='font-size: 14px; color:#009999; text-align:left; font-weight: bold;'>ข้อมูลผู้รับ</span><br>
                 <table width='50%' border='0'>
                     <tr>
                        <td style='font-size: 14px; font-weight: bold; width: 20%;'>ชื่อผู้รับ:</td>
                        <td style='color:#999; font-size: 14px;'> $customer_shipping &nbsp;</td>
                     </tr>
                     <tr>
                        <td style='font-size: 14px; font-weight: bold;'>ที่อยู่ในการจัดส่ง:</td>
                        <td style='color:#999; font-size: 14px;'>
                         $od_shipping_address1 &nbsp; $od_shipping_address2 &nbsp; $od_shipping_city &nbsp;
                         $od_shipping_state &nbsp; $od_shipping_postal_code </td>
                     </tr>
                      <tr>
                         <td style='font-size: 14px; font-weight: bold;'> เบอร์โทร :</td>
                         <td style='color:#999; font-size: 14px;'> $od_payment_phone</td>
                     </tr>
                 </table><br>
                
             
             <span style='font-size: 14px; color:#009999; text-align:left; font-weight: bold;'>ข้อมูลติดต่อ</span><br>
                 <table width='50%' border='0'>
                     <tr>
                         <td style='font-size: 14px; font-weight: bold; width: 20%;'>อีเมล :</td>
                         <td style='color:#999; font-size: 14px;'> $od_payment_email</td>
                     </tr>
                     <tr>
                         <td style='font-size: 14px; font-weight: bold;'>เบอร์มือถือ:</td>
                         <td style='color:#999; font-size: 14px;'>$od_payment_phone </td>
                     </tr>
                 </table><br>
                 
                 <span style='font-size: 14px; color:#009999; text-align:left; font-weight: bold;'>ข้อมูลการจัดส่งสินค้า</span><br>
                 <table width='50%' border='0'>
                     <tr>
                         <td style='font-size: 14px; font-weight: bold; width: 20%;'>วิธีจัดส่ง:</td>
                         <td style='color:#999; font-size: 14px;'>$ship</td>
                     </tr>
                     <tr>
                         <td style='font-size: 14px; font-weight: bold;'>ระยะเวลาที่เตรียมสินค้าเพื่อส่ง:</td>
                          <td style='color:#999; font-size: 14px;'>ภายใน 3 วัน</td>
                     </tr>
                 </table><br>
                 <div> 

                <p style='text-align:left; font-size: 19px; color:#666666; font-weight: bold;'>มั่นใจ Arduino Bangkok</p>
                <span style='color:#4d4d4d'>
                    &nbsp;&nbsp;&nbsp;ซื้อสินค้ากับ Arduino Bangkok ได้ตลอด 24 ชั่วโมง มั่นใจได้ 100% เราจัดส่งสินค้าทางไปรษณีย์ 
                    ทั้งแบบลงทะเบียนและแบบ EMS แพ็คสินค้าอย่างดีปลอดภัย ส่งถึงมือลูกค้าอย่างแน่นอน ร้านเราอยู่ใกล้ไปรษณีย์ ถ้าแจ้งโอนก่อนเวลา 14:30 น. จัดส่งสินค้าในวันเดียวกัน ถ้าเกินจะจัดส่งสินค้าในตอนเช้าของวันถัดไป 
                  <ul>
                    <li>ค่าจัดส่งแบบไปรษณีย์ EMS 50 บาท</li>                               
                    <li>ค่าจัดส่งแบบไปรษณีย์ลงทะเบียน 30 บาท</li>
                    <li>สั่งซื้อสินค้า 1500 บาทขึ้นไป ส่งแบบ EMS ฟรี</li>
                    <li> <u><b>ถ้าทำรายการสั่งซื้อสำเร็จ = มีของพร้อมส่งทางร้านจองสินค้าไว้ให้ด้วย 3 วัน</b></u></li>
                  </ul>
                </span><br>


                <div style='text-align: center;'>
                <!--<img src='http://tungmay-magiccream.com/images/EMS_1.jpg' alt='EMS_1' width='50%'s>-->
                     <img src='images/EMS1.jpg' alt=''  width='50%'/>
                </div>
                
                <p style='text-align:left; font-size: 18px; font-weight: bold;'>ระยะเวลาจัดส่ง</p>
                <span style='color:#4d4d4d'>
                    &nbsp;&nbsp;&nbsp;เมื่อทางร้านได้รับการแจ้งชำระสินค้าเรียบร้อยแล้ว ถ้าแจ้งก่อน 14.30 น. ส่งของภายในวันเดียวกัน 
                  <ul>
                    <li>แบบ EMS ภาคกลางได้รับภายใน 2 วัน ต่างภาคได้รับภายใน 3-4 วัน</li>                               
                    <li>แบบ ลงทะเบียน ได้รับภายในเวลา 3-7 วัน เหมาะกับลูกค้าที่ไม่ซีเรียสเรื่องเวลา</li>
                    <li>ระบบจะส่งเลขแทรคไปรษณีย์ ไปให้ทาง email และแจ้ง SMS ส่งตรงถึงโทรศัพท์มือถือ</li>
                    <li><u>ลูกค้าที่โอนเงินมาแล้วไม่ได้แจ้งทางร้าน เพื่อความรวดเร็วในการจัดส่งสินค้า ช่วยแจ้งด้วยนะครับ เพื่อที่จะได้จัดส่งภายในวันเดียวกัน</u></li>
                  </ul>
                </span><br>


                <p style='text-align:left; font-size: 18px; font-weight: bold;'>การจัดส่ง</p>
                <span style='color:#4d4d4d'>
                  <ul>
                    <li>โอนเงินและแจ้งโอนก่อนเวลา 14.30 น. จัดส่งสินค้า Arduino ในวันนั้น (จันทร์-ศุกร์)</li>                               
                    <li>โอนเงินและแจ้งโอนหลังเวลา 14.30 น. จัดส่งสินค้า Arduino ในวันถัดไป (จันทร์-ศุกร์)</li>
                    <li>วันศุกร์ โอนเงินและแจ้งโอนหลังเวลา 14.30 น. ถึง 24.00 น. จัดส่งสินค้า Arduino ในวันเสาร์ตอนเช้า</li>
                    <li>โอนเงินและแจ้งโอนวันเสาร์-อาทิตย์ จัดส่งสินค้า Arduino ในวันจันทร์</li>
                  </ul>
                    *** <u>หมายเหตุ </u>: <u>ไปรษณีย์อัพเดทเลขแทรคตอน 16.00 น. ในวันปกติ วันเสาร์อัพเดทตอน 12.00 น.</u> 
                </span><br>



                <span style='color:#4d4d4d; font-size: 17px; font-weight: bold;'>
                  &nbsp;&nbsp;&nbsp;
                        ชำระเงินผ่านธนาคาร เรามีหลายธนาคารให้เลือก เพื่ออำนวยความสะดวกให้กับลูกค้า 
                </span><br><br>

                <div style='text-align: center;'>
                <!--<img src='http://tungmay-magiccream.com/images/how2_1.gif' alt='how2_1' width='550px'>-->
                  <img src='images/how2.jpg' alt='' width='45%'/>                  
                </div>               

        </div>    


        <div>
               <p style='text-align:left; font-size: 17px; color: #006666'>การรับประกัน Arduino Bangkok</p>
               <span>โดย &nbsp;<span style='font-weight: bold;'>เจ้าของร้าน</span></span>
               <p style='text-align:left; font-size: 15px; color: darkblue'>
                 &nbsp;&nbsp; Arduino Bangkok มี Arduio ครบทุกอย่างที่อยากได้ จากทุกแห่งทั่วโลก ในราคาที่ถูกที่สุด  
                 รับประกันคุณภาพ เสียเปลี่ยนตัวใหม่ให้ทันที ไม่ต้องรอ ไม่ต้องเสียค่าส่งสินค้ามาเคลม </p>

               <div style='text-align: center;'>
<!--                   <img src='http://tungmay-magiccream.com/images/ins_1.jpg' alt='ins_1' width='50%'>-->
                   <img src='images/INS_1.jpg' alt='' width='50%'/>
               </div>

               <span style='font-size: 17px;'>&nbsp;&nbsp;&nbsp;
                   ซื้อสินค้าจาก Arduino Bangkok มั่นใจได้ รับประกันคุณภาพ ด้วยการมีประกันสินค้าที่ดีกว่าเราได้ตรวจเช็คและรับประกันสินค้าซื้อไปใช้ได้อย่างมั่นใจและสบายใจ  
                   เพื่อให้ลูกค้าถูกใจที่สุด<br>               
                   ทั้ง นี้หากมีสินค้าที่ได้รับมีความผิดพลาดอันใด ที่อาจเกิดขึ้นได้  ไม่ว่าจะเป็นอุปกรณ์เสีย หรือความเสียหายระหว่างการส่ง โดยที่ลูกค้าไม่ได้เป็นคนกระทำ 
                    Arduino Bangkok รับประกันเปลี่ยนตัวใหม่ให้ทันที ภายใน 30 วันหลังจากได้รับสินค้า พร้อมออกค่าส่งสินค้าให้ ทั้งค่าส่งมา และค่าส่งกลับ ลูกค้าไม่ต้องรับภาระเรื่องค่าจัดส่ง โดยสามารถใช้กล่องเดิมส่งมาได้  โดยมีเงื่อนไขดังนี้   
               </span>

               <ul>
                    <li>การ ซื้อสินค้า ถือว่าลูกค้ายินยอมและปฎิบัติตามเงื่อนไขการรับประกันของทางร้านแล้ว กรณีไม่ตรงตามเงื่อนไข 
                        ทางร้านขอสงวนสิทธิ์ในการรับประกันสินค้า</li>                               
                    <li>สินค้า ต้องเขียนรายละเอียดปัญหาแนบมาด้วย ส่งมาพร้อมใบเสร็จรับเงินหรือสำเนาใบเสร็จรับเงิน จาก Arduino Bangkok มา
                        ในกล่องด้วย เพื่อเป็นหลักฐานสำคัญมาก กรณีที่ไม่มีทางร้านขอสงวนสิทธิ์เนื่องจากไม่ตรงตามเงื่อนไขการรับประกัน</li>
                    <li>สินค้าจะต้องเป็นความเสียหายที่เกิดจากตัวอุปกรณ์ ไม่ใช่ความเสียหายที่เกิดจากการใช้งานของตัวลูกค้าเอง</li>
                    <li>สินค้าต้องอยู่ในสภาพที่สมบูรณ์เช่น ไม่มีรอยไหม้ แตกหัก ไม่มีรอยงัดแงะ หรืออื่น ๆ</li>
                    <li>ความเสียหายที่เกิดขึ้นต้องไม่เกิดจากใช้งานผิดประเภท ดัดแปลง แก้ไข หรือใส่ไฟผิดขั้ว</li>
                    <li>อุปกรณ์ประเภทเซอร์เฟสเมาส์ SMD การบัดกรีมีความเสียงต่ออุปกรณ์เสียหาย ทางร้านขอยกเว้นการรับประกันอุปกรณ์ประเภทนี้</li>
                    <li>การรับประกัน จะพิจารณาจากข้อเท็จจริง  ขึ้นอยู่กับทาง Arduino Bangkok</li>
                    <li>การรับประกันเปลี่ยนอุปกรณ์ใหม่ Arduino Bangkok รับประกันสินค้าทุกชิ้นที่ขายในร้าน โดยร้านเป็นผู้รับผิดชอบความเสียหายเอง</li>
                    <li>สการรับประกัน นี้ อาจเป็นการเปลี่ยนสินค้าใหม่ หรือ คืนเงิน ขึ้นอยู่กับ Arduino Bangkok พิจารณา</li>
                    <li>ถ้าสินค้ามีปัญหา การจัดส่งสินค้าตัวใหม่ ผ่านทางไปรษณีย์ Arduino Bangkok จะแนบค่าส่งตอนที่ส่งมาคืนให้ในกล่อง และออกค่าส่งกลับส่งไปให้ลูกค้า ลูกค้าไม่ต้องรับภาระเรื่องค่าจัดส่ง</li>
                    <li>การ นับวัน หากสินค้าถึงมือลูกค้าในวันที่ 1/5/2564 ( ตรวจสอบได้จากไปรษณีย์ไทย) เมื่อพบความเสียหาย ลูกค้าจะต้องส่งสินค้ากลับคืนมาที่ Arduino Bangkok ภายในวันที่ 31/5/2564 โดยอ้างอิงจากเลขแทรค ผ่านไปรษณีย์ลงทะเบียน หรือแบบ EMS 
                        ถ้ามีเลือกบริการเสริมพิเศษนอกเหนือจากวิธีส่งปกติ เช่น ค่าบริการพิเศษ พกง. ลูกค้าเป็นออกค่าบริการพิเศษนี้เอง</li>
                    <li>เมื่อ ทำการส่งเรียบร้อยแล้ว ลูกค้าจะต้อง ส่งหมายเลขพัสดุ tracking ที่สามารถ track ได้จากทางเว็บไซต์ของทางไปรษณีย์ไทย มาให้กับ Arduino Bangkok  แล้วเราจะพิจารณาตรวจสอบและแจ้งให้ลูกค้าทราบผ่านทางช่องทางที่ติดต่อได้ที่ ลูกค้าให้ไว้</li>

                </ul>
              <span style='font-size: 18px; color:#009999; text-align:center; font-weight: bold;'>วิธีการชำระเงิน</span><br>
                <table style='font-size: medium;' width='100%' border='0'  cellpadding='5' cellspacing='1' class='entryTable' >
                     <tr style='background-color: #e6e6e6; height:30px;' > 
                        <td width='100' >วิธีการชำระเงิน </td>
                     </tr>
                     <tr style='height: 50px; font-size:14px; color:#4d4d4d;' >    
                        <td>
                            &nbsp;&nbsp;&nbsp; ชำระเงินด้วยการโอนเงินผ่านธนาคาร (ATM)
                            &nbsp;&nbsp; ชำระเงินผ่านธนาคาร เรามีหลายธนาคารให้เลือก เพื่ออำนวยความสะดวกให้กับลูกค้า 


                            <table width='100%' cellspacing='1'  align='center'>
                              <tr>
                                <td> </td>
                                <td width='15%' align='left' style='color:#00773C'>ธ.กสิกรไทย</td>
                                <td width='22%' align='left' style='color:#666'>xxx-x-xxxxx-x</td>
                                <td width='22%' align='left' style='color:#999'>xxx  xxx</td>
                                <td width='18%' align='right' style='color:#666'>xxxx</td>
                                <td width='15%' align='right' style='color:#999'>xxxx</td>
                             </tr>
                             <tr>
                                <td> </td>
                                <td width='15%' align='left' style='color:#909'>ธ.ไทยพาณิชย์</td>
                                <td width='22%' align='left' style='color:#666'>xxx-x-xxxxx-x</td>
                                <td width='22%' align='left' style='color:#999'>xxx  xxx</td>
                                <td width='18%' align='right' style='color:#666'>xxxx</td>
                                <td width='15%' align='right' style='color:#999'>xxxx</td>
                             </tr>
                             <tr>
                                <td> </td>
                                <td width='15%' align='left' style='color:#00C'>ธ.กรุงเทพ</td>
                                <td width='22%' align='left' style='color:#666'>xxx-x-xxxxx-x</td>
                                <td width='22%' align='left' style='color:#999'>xxx  xxx</td>
                                <td width='18%' align='right' style='color:#666'>xxxx</td>
                                <td width='15%' align='right' style='color:#999'>xxxx</td>
                             </tr>
                             <tr>
                                <td> </td>
                                <td width='15%' align='left' style='color:#0FF'>ธ.กรุงไทย</td>
                                <td width='22%' align='left' style='color:#666'>xxx-x-xxxxx-x</td>
                                <td width='22%' align='left' style='color:#999'>xxx  xxx</td>
                                <td width='18%' align='right' style='color:#666'>xxxx</td>
                                <td width='15%' align='right' style='color:#999'>xxxx</td>
                             </tr>
                            </table>
                        </td>
                    </tr>  
                </table><br/>
                    <p style=' font-size:14px; text-align:left'>หมายเหตุ</p>
                    <p style=' font-size:14px; color: #008000; text-align:left'>
                        <i style='color:#F00'>*</i>
                            &nbsp;&nbsp; การทำธุรกรรมของธนาคารต่างสาขาหรือต่างธนาคาร จะมีค่าธรรมเนียมเพิ่ม แล้วแต่ธนาคาร
                            <i>ถ้าทำธุรกรรมภายในธนาคารเดียวกัน จะเสียค่าธรรมเนียมน้อยที่สุดหรือไม่เสียเลย</i> บางธนาคารจะไม่คิดค่าธรรมเนียมโดยจำกัดว่าฟรีได้กี่ครั้งใน 1 เดือน เช่นฟรีค่าธรรมเนียมเมื่อโอนในธนาคารเดียวกัน 5 ครั้ง/เดือน ผ่านทางตู้ ATM
                               ดังนั้น ควรเลือกโอนมาที่ธนาคารเดียวกัน จะเสียค่าธรรมเนียมน้อยที่สุดหรือไม่เสียค่าธรรมเนียมตามเงื่อนไขที่ธนาคารกำหนด</p> <br><br>
                               
                            <a href='http://localhost/arduionbangkok_2/informpayment.php'target='_blank'> << ไปหน้าแจ้งชำระเงิน </a><br><br>                              
                             <span style='font-size: 14px;'><b>ขอขอบคุณที่อุดหนุนและใช้บริการกับเรา ร้าน Arduino Bangkok</b></span> 
                              
        </div>
";
 ?>
