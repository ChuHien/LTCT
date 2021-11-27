

import com.example.test.service.orderService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.core.parameters.P;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;

import javax.validation.Valid;


@Controller
@RequestMapping("/api/v1/")

public class OrderController {

    @GetMapping ("/order/{id}/status")
    public int getDeliveryStatus(@PathVariable("id") int id){
        return orderService.getStatus();
    }

    @GetMapping("/order/{id}/message")
    public String getDeliverySuccess(@PathVariable("id") int id){
        return orderService.getMessage();
    }

    @GetMapping("/order/{id}/message")
    public Order getDeliveryHistory(@PathVariable("id") int id){
        return orderService.getOrder();
    }

    @GetMapping("/order/{id}/payment")
    public double receivedFromCustomer(@PathVariable("id") int id){
        return orderService.getTotalMoney();
    }

    @GetMapping("/customer/{id}/order")
    public List<Order> getDeliverySuccess(@PathVariable("id") int id){
        return orderService.getOrderSuccess();
    }

    @GetMapping("/customer/{id}/order-history")
    public List<Order> getDeliveryHistory(@PathVariable("id") int id){
        return orderService.getOrderHistory();
    }








}
