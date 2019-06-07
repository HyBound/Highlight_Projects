using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
//using InsuranceApp.Models;
using InsuranceApp.ViewModels;

namespace InsuranceApp.Controllers
{
    public class AdminController : Controller
    {
        public ActionResult Index()
        {
            using (InsuranceEntities1 db = new InsuranceEntities1())
            {
                //var signups = db.SignUps.Where(x=> x.Removed == null).ToList(); //Replaces ADO

                var quotes = (from c in db.Users //Linq version of instantiating signups
                               //where c.Id != 0
                               select c).ToList();
                var users = new List<User>();
                foreach (var user in quotes)
                {
                    var userVm = new User();
                    userVm.Id = user.Id;
                    userVm.FirstName = user.FirstName;
                    userVm.LastName = user.LastName;
                    userVm.EmailAddress = user.EmailAddress;
                    userVm.Total = user.Total;
                    users.Add(userVm);
                }
                return View(users);
            }
        }
        public ActionResult Unsubscribe(int Id)
        {
            using (InsuranceEntities1 db = new InsuranceEntities1())
            {
                var user = db.Users.Find(Id);
                db.SaveChanges();
            }
            return RedirectToAction("Index");
        }
    }
}


