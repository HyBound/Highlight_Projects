using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
//using InsuranceApp.Models;

namespace InsuranceApp.Controllers
{
    public class HomeController : Controller
    {
        
        public ActionResult Index()
        {
            return View();
        }

        [HttpPost]
        public ActionResult YourQuote(string FirstName, string LastName, string EmailAddress, string CarMake, string CarModel, 
            int CarYear, DateTime DOB, bool DUI, int Tickets, string CoverageType)
        {
            if (string.IsNullOrEmpty(FirstName) || string.IsNullOrEmpty(LastName) || string.IsNullOrEmpty(EmailAddress))
            {
                return View("~/Views/Shared/Error.cshtml");
            }
            else
            {
                using (InsuranceEntities1 db = new InsuranceEntities1())
                {
                    var quote = new User();
                    quote.FirstName = FirstName;
                    quote.LastName = LastName;
                    quote.EmailAddress = EmailAddress;
                    quote.CarMake = CarMake;
                    quote.CarModel = CarModel;
                    quote.CarYear = CarYear;
                    quote.DOB = DOB;
                    quote.DUI = DUI;
                    quote.Tickets = Tickets;
                    quote.CoverageType = CoverageType;
                    quote.Total = ComputeQuote(quote);
                    db.Users.Add(quote);
                    db.SaveChanges();
                    return View(quote);
                }
                
            }
        }

        public int? ComputeQuote(User user)
        {
            user.Total = 50;

            if (DateTime.Now.AddYears(-25) > user.DOB && DateTime.Now.AddYears(-18) <= user.DOB)
            {
                user.Total += 25;
            }
            if (DateTime.Now.AddYears(-18) > user.DOB)
            {
                user.Total += 100;
            }
            if (DateTime.Now.AddYears(-100) < user.DOB)
            {
                user.Total += 25;
            }
            if (user.CarYear < 2000)
            {
                user.Total += 25;
            }
            if (user.CarYear > 25)
            {
                user.Total += 25;
            }
            if (user.CarMake == "Porsche")
            {
                user.Total += 25;
            }
            if (user.CarMake == "Porsche"&& user.CarModel == "Carrera")
            {
                user.Total += 100;
            }
            user.Total += user.Tickets * 10;
            if (user.DUI)
            {
                user.Total += user.Total * 25 / 100;
            }
            if (user.CoverageType?.ToLower() == "full" || user.CoverageType?.ToLower() == "full coverage")
            {
                user.Total += user.Total * 50 / 100;
            }
            return user.Total;
        }
        //public ActionResult ComputeQuote()
        //{

        //}
    }

}




