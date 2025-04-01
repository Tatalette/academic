package view;

import javax.swing.*;
import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;

public class ResultPanel extends JFrame{
    private JButton ViewButton;
    private JPanel ResultPanel;
    private JLabel recipeIMG;
    private JLabel recipeTitle;

    public ResultPanel(String title, Icon img, int id) {
        setContentPane(ResultPanel);
        this.recipeIMG.setIcon(img);
        this.recipeTitle.setText(title);

        this.ViewButton.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                System.out.println("View Recipe Button pressed for "+ id);
            }
        });
    }
}
