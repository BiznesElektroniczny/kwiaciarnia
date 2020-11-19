import random as rand
from telnetlib import EC
from time import sleep

from selenium import webdriver
from selenium.webdriver import ActionChains
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support.expected_conditions import presence_of_element_located
from webdriver_manager.chrome import ChromeDriverManager

'''
def get_text_excluding_children(driver, element):
    return driver.execute_script("""
    return jQuery(arguments[0]).contents().filter(function() {
        return this.nodeType == Node.TEXT_NODE;
    }).text();
    """, element)
'''

# rand = random.SystemRandom()
rand.seed(2)
url = 'https://localhost'








plec = 'Pan'  # Pan lub Pani
imie = 'Jan'
nazwisko = 'Kowalski'
email = 's'+str(rand.SystemRandom().randint(100000, 1000000))+'@student.pg.edu.pl' #'s175703@student.pg.edu.pl' #+ str(rand.SystemRandom().randint(1, 100000))
haslo = 'haslo'
urodziny = '1999-01-01'
adres = 'Kalinowa 15'
kod_pocztowy = '80-177'
miejscowosc = 'Gdańsk'

ile_z_kategorii = rand.randint(5, 8)
liczba_produktow_do_kupienia = 10  # 10
czas_spania = 0



implicit_wait_time=2000

if __name__ == '__main__':
    '''
    with webdriver.Chrome(ChromeDriverManager().install()) as driver:
        wait = WebDriverWait(driver, 10)
        driver.get("https://google.com/ncr")
        driver.find_element(By.NAME, "q").send_keys("cheese" + Keys.RETURN)
        first_result = wait.until(presence_of_element_located((By.CSS_SELECTOR, "h3>div")))
        print(first_result.get_attribute("textContent"))'''

    with webdriver.Chrome(ChromeDriverManager().install()) as driver:
        wait = WebDriverWait(driver, 10)
        driver.get(url)

        '''
        wait.until(presence_of_element_located(
            (By.XPATH, "//i[contains(@class, 'material-icons') and contains(@class, 'expand-more')]")))
        driver.find_element_by_xpath(
            "//i[contains(@class, 'material-icons') and contains(@class, 'expand-more')]").click()
        el=wait.until(presence_of_element_located(
            (By.XPATH, "//a[contains(@data-iso-code, 'pl')]")))
        driver.implicitly_wait(implicit_wait_time)
        el.click()'''

        # sleep(1)
        #sleep(czas_spania)
        wait.until(presence_of_element_located((By.XPATH, "//li[@class='category']")))
        kategorie = driver.find_elements_by_xpath("//li[@class='category']")
        # elementCount = len(kategorie)
        indexy = []
        for j in range(1, len(kategorie)):
            indexy.append(j)

        # index = rand.randint(1, len(kategorie))
        # index = 5
        # kategorie[index1].click()

        liczba_produktow_w_koszyku = 0

        while liczba_produktow_w_koszyku < liczba_produktow_do_kupienia:
            wait.until(presence_of_element_located((By.XPATH, "//li[@class='category']")))

            index = indexy.pop(rand.randint(0, len(indexy) - 1))

            path = "(//li[@class='category'])[" + str(index) + "]/../../../../../.."
            query = []
            while path[-3:] == '/..':
                # sleep(0.3)
                # print(path)
                # print(get_text_excluding_children(driver, driver.find_element_by_xpath(path)))
                try:
                    # query.append(driver.find_element_by_xpath(path + "[contains(@name,li])"))
                    query.append(driver.find_element_by_xpath(path))
                    # print(path)
                except:
                    pass
                path = path[:-3]
            driver.implicitly_wait(implicit_wait_time)
            for i in range(0, len(query) - 1):
                ActionChains(driver).move_to_element(
                    query[i]).perform()
                driver.implicitly_wait(implicit_wait_time)
                # driver.execute_script("arguments[0].scrollIntoView();", query[i])

            #sleep(2)
            # print(path)

            # print(get_text_excluding_children(driver,driver.find_element_by_xpath(path)))
            # query[-1].click()

            sleep(czas_spania)
            path += "/a"

            el=driver.find_element_by_xpath(path)
            ActionChains(driver).move_to_element(el)
            el.click()

            '''
            ActionChains(driver).move_to_element(
                driver.find_element_by_xpath("//*[@class='category']/../../../../..")).perform()
            ActionChains(driver).move_to_element(driver.find_element_by_xpath("//*[@class='category'][1]/../../../..")).perform()
            ActionChains(driver).move_to_element(driver.find_element_by_xpath("//*[@class='category'][1]/../..")).perform()
            ActionChains(driver).move_to_element(driver.find_element_by_xpath("//*[@class='category'][1]")).perform()
            '''

            # ActionChains(driver).move_to_element(kategorie[index1]).perform()
            #sleep(1)
            # WebDriverWait(driver, 10).until(EC.element_to_be_clickable(kategorie[index1]))
            # ActionChains(driver).move_to_element(kategorie[index1]).click().perform()

            i = 0
            while liczba_produktow_w_koszyku < liczba_produktow_do_kupienia:
                sleep(czas_spania)
                wait.until(presence_of_element_located(
                    (By.ID, "products")))
                produkty = driver.find_elements_by_class_name("product-thumbnail")
                if len(produkty) <= i:
                    break
                produkt = produkty[i]
                i += 1

                if i > ile_z_kategorii:
                    break

                driver.execute_script("arguments[0].scrollIntoView();", produkt)
                ActionChains(driver).move_to_element(
                    produkt).perform()
                #sleep(1.5)
                sleep(czas_spania)
                produkt.click()
                #sleep(0.5)
                ilosc=wait.until(presence_of_element_located((By.NAME,'qty')))
                #ilosc = driver.find_element_by_name('qty')
                ilosc.clear()
                ilosc.send_keys(str(rand.randint(1, 5)))
                #sleep(0.5)
                sleep(czas_spania)
                dodaj=wait.until(presence_of_element_located((By.CLASS_NAME,'add-to-cart')))
                dodaj.click()
                # driver.find_element_by_xpath("//*[@class='add-to-cart']").click()
                #sleep(2.5)
                sleep(czas_spania)
                kontynuuj_zakupy=wait.until(presence_of_element_located((By.XPATH,"//*[contains(text(), 'Kontynuuj zakupy') and name()='button']")))
                driver.implicitly_wait(implicit_wait_time)
                kontynuuj_zakupy.click()
                #sleep(0.5)
                sleep(czas_spania)
                driver.back()
                #sleep(1)
                liczba_produktow_w_koszyku += 1

        sleep(czas_spania)
        cart=wait.until(presence_of_element_located((By.CLASS_NAME, "cart-preview")))
        #cart = driver.find_element_by_class_name("cart-preview")
        ActionChains(driver).move_to_element(
            cart).perform()
        driver.execute_script("arguments[0].scrollIntoView();", cart)
        cart.click()
        #sleep(1)
        sleep(czas_spania)
        wait.until(presence_of_element_located((By.XPATH, "//a[@class='remove-from-cart']")))
        bins = driver.find_elements_by_xpath("//a[@class='remove-from-cart']")
        if len(bins) > 0:
            bin = bins[rand.randint(0, len(bins) - 1)]
            ActionChains(driver).move_to_element(
                bin).perform()
            driver.execute_script("arguments[0].scrollIntoView();", bin)
            sleep(czas_spania)
            bin.click()

        # sleep(1)
        sleep(czas_spania)
        driver.back()

        #sleep(0.5)
        el = wait.until(presence_of_element_located((By.XPATH, "//*[contains(text(), 'Zaloguj się')]")))
        el.click()
        #sleep(0.3)
        el = wait.until(presence_of_element_located((By.XPATH, "//*[contains(text(), 'Nie masz konta? Załóż je tutaj')]")))
        el.click()
        #sleep(0.3)
        el = wait.until(
            presence_of_element_located((By.XPATH,  "//*[contains(@value, '" + str(1 if plec is 'Pan' else 2) + "') and contains(@name,'id_gender')]")))
        el.click()
        #sleep(0.3)
        el = wait.until(
            presence_of_element_located((By.NAME, "firstname")))
        el.send_keys(imie)
        el = wait.until(
            presence_of_element_located((By.NAME, "lastname")))
        el.send_keys(nazwisko)
        el = wait.until(
            presence_of_element_located((By.NAME, "email")))
        el.send_keys(email)
        el = wait.until(
            presence_of_element_located((By.NAME, "password")))
        el.send_keys(haslo)
        el = wait.until(
            presence_of_element_located((By.NAME, "birthday")))
        el.send_keys(urodziny)
        el = wait.until(
            presence_of_element_located((By.NAME, "psgdpr")))
        el.click()

        #sleep(10000)
        sleep(czas_spania)
        el = wait.until(
            presence_of_element_located((By.XPATH, "//*[contains(text(), 'Zapisz')]")))
        el.click()

        sleep(czas_spania)
        cart = wait.until(
            presence_of_element_located((By.CLASS_NAME, "cart-preview")))
        ActionChains(driver).move_to_element(
            cart).perform()
        driver.execute_script("arguments[0].scrollIntoView();", cart)
        cart.click()
        sleep(czas_spania)
        realizacja=wait.until(
            presence_of_element_located((By.XPATH, "//*[contains(text(), 'Realizuj zamówienie') and name()='a']")))
        driver.execute_script("arguments[0].scrollIntoView();", realizacja)
        realizacja.click()


        el = wait.until(presence_of_element_located((By.NAME, "address1")))
        driver.implicitly_wait(implicit_wait_time)
        el.send_keys(adres)
        el = wait.until(presence_of_element_located((By.NAME, "postcode")))
        el.send_keys(kod_pocztowy)
        el = wait.until(presence_of_element_located((By.NAME, "city")))
        el.send_keys(miejscowosc)
        sleep(czas_spania)
        el = wait.until(presence_of_element_located((By.XPATH, "//footer/*[contains(text(), 'Dalej') and name()='button']")))
        #driver.implicitly_wait(10)
        el.click()
        #sleep(1)
        #driver.implicitly_wait(1000)
        el = wait.until(
            presence_of_element_located((By.ID, "delivery_option_3")))
        ActionChains(driver).move_to_element(
            el).click().perform()
        #el.click()

        #sleep(1000)
        #el = wait.until(presence_of_element_located((By.XPATH, "//form/*[contains(text(), 'Dalej') and name()='button']")))
        #driver.implicitly_wait(10)
        sleep(czas_spania)
        el=wait.until(presence_of_element_located((By.NAME, "confirmDeliveryOption")))
        el.click()
        el = wait.until(presence_of_element_located((By.ID, "payment-option-1")))
        el.click()
        el = wait.until(presence_of_element_located((By.ID, "conditions_to_approve[terms-and-conditions]")))
        el.click()
        sleep(czas_spania)
        el = wait.until(presence_of_element_located((By.XPATH,"//*[contains(text(), 'Zamówienie z obowiązkiem zapłaty') and name()='button']")))
        el.click()
        sleep(czas_spania)
        el = wait.until(
            presence_of_element_located((By.XPATH, "//a[@class='account']")))
        el.click()
        sleep(czas_spania)
        el = wait.until(presence_of_element_located(
            (By.XPATH, "//span[contains(., 'Historia i szczegóły zamówień') and @class='link-item']")))
        el.click()
        sleep(czas_spania)
        el = wait.until(presence_of_element_located(
            (By.XPATH, "//*[contains(., 'Szczegóły') and name()='a']")))
        el.click()

        sleep(1000000)
